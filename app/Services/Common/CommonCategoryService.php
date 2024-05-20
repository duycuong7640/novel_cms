<?php

namespace App\Services\Common;

use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommonCategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getListMenu($_data = [])
    {
        return self::groupListMenu($this->categoryRepository->getListMenu($_data), $_data);
    }

    public function findById($_id)
    {
        return $this->categoryRepository->find($_id);
    }

    public function findListParentId($_id)
    {
        return $this->categoryRepository->findListParentId($_id);
    }

    public function updateStatus($_id, $_status)
    {
        $detail = self::findById($_id);
        return $this->categoryRepository->updateStatus($_id, $_status, (($detail->$_status) ? 0 : 1));
    }

    public function destroy($_id)
    {
        return $this->categoryRepository->destroy($_id);
    }

    public function checkSlug($_slug, $slug_tmp, $i = 0)
    {
        $row = $this->categoryRepository->checkSlug($slug_tmp);
        if (!empty($row->id)) {
            $i++;
            return self::checkSlug($_slug, $_slug . "-" . $i, $i);
        } else {
            return $slug_tmp;
        }
    }

    public function create($_data)
    {
        if (isset($_data['_token'])) unset($_data['_token']);
        unset($_data['proengsoft_jsvalidation']);
        $db = array_merge($_data, [
            'slug' => !empty($_data['title']) ? Str::slug($_data['title'], '-') : '',
            'admin_id' => Auth::guard(Helpers::renderGuard())->user()->id,
            //'type' => $this::TYPE[0],
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s")
        ]);
        $db["slug"] = self::checkSlug($db["slug"], $db["slug"], 0);

        return $this->categoryRepository->create($db);
    }

    public function update($_data, $_id, $_detail)
    {
        if (isset($_data['_token'])) unset($_data['_token']);
        if (isset($_data['page'])) unset($_data['page']);
        unset($_data['proengsoft_jsvalidation']);
        $db = array_merge($_data, [
            'updated_at' => date("Y/m/d H:i:s")
        ]);

        if ($_detail->title == $_data["title"]) {
            $db["slug"] = $_detail->slug;
        } else {
            $db["slug"] = self::checkSlug(Str::slug($_data["title"], "-"), Str::slug($_data["title"], "-"), 0);
        }

        return $this->categoryRepository->update($db, $_id);
    }

    public function groupListMenu($_data, $_params = [])
    {
        $arr = [];
        foreach ($_data as $row) {
            if (empty($row->parent_id)) {
                $arr['parent'][$row->id] = $row->toArray();
            } else {
                $arr['list'][$row->parent_id][] = $row->toArray();
            }
            $arr['ids'][$row->id] = $row->title;
            if (in_array($row->type, [\dataCategory::TYPE[3]]) && !$row->parent_id) $arr['footer'][] = $row;
        }

        if (!empty($arr['list'])) {
            foreach ($arr['list'] as $k => $row) {
                if (empty($arr['ids'][$k])) unset($arr['list'][$k]);
            }
        }

        if (isset($_params['multi'])) {
            return [
                'select' => !empty($arr['parent']) ? self::mergeListMenu($arr, $_params) : '<option value="">' . \adminForm::FORM_HEAD['SEARCH_CATEGORY'] . '</option>',
                'list' => !empty($arr['parent']) ? self::mergeListMenuArray($arr, $_params) : [],
                'menu' => !empty($arr['parent']) ? self::multiMenu($arr, null, null, $_params) : [],
                'ids' => !empty($arr['ids']) ? $arr['ids'] : [],
                'footer' => !empty($arr['footer']) ? $arr['footer'] : []
            ];
        } else {
            return !empty($arr['parent']) ? self::mergeListMenu($arr, $_params) : '<option value="">' . \adminForm::FORM_HEAD['SEARCH_CATEGORY'] . '</option>';
        }
    }

    public function mergeListMenu($_data, $_params, $parent_id = null, $trees = null, $i = 0, $str = '')
    {
        //params
        $active_id = !empty($_params['parent_id']) ? $_params['parent_id'] : [];

        //parent
        if (!empty($_data['parent'])) {
            $trees .= '<option value="">' . \adminForm::FORM_HEAD['SEARCH_CATEGORY'] . '</option>';
            foreach ($_data['parent'] as $row) {
                $trees .= '<option value="' . $row['id'] . '" ' . (in_array($row['id'], $active_id) ? 'selected' : '') . '>' . $row['title'] . '</option>';
                if (!empty($_data['list'][$row['id']])) $trees = self::mergeListMenu($_data['list'], $_params, $row['id'], $trees, 1, '--');
            }
        } else {
            $tmp = '';
            for ($j = 0; $j < $i; $j++) $tmp .= $str;
            foreach ($_data[$parent_id] as $row) {
                $trees .= '<option value="' . $row['id'] . '" ' . (in_array($row['id'], $active_id) ? 'selected' : '') . '>' . $tmp . ' ' . $row['title'] . '</option>';
                if (!empty($_data[$row['id']])) $trees = self::mergeListMenu($_data, $_params, $row['id'], $trees, $i + 1, '--');
            }
        }
        return $trees;

    }

    public function mergeListMenuArray($_data, $_params, $parent_id = null, $trees = null, $i = 0, $str = '')
    {
        //parent
        if (!empty($_data['parent'])) {
            foreach ($_data['parent'] as $row) {
                $trees[$row['id']] = $row['title'];
                if (!empty($_data['list'][$row['id']])) $trees = self::mergeListMenuArray($_data['list'], $_params, $row['id'], $trees, 1, '--');
            }
        } else {
            $tmp = '';
            for ($j = 0; $j < $i; $j++) $tmp .= $str;
            foreach ($_data[$parent_id] as $row) {
                $trees[$row['id']] = $tmp . ' ' . $row['title'];
                if (!empty($_data[$row['id']])) $trees = self::mergeListMenuArray($_data, $_params, $row['id'], $trees, $i + 1, '--');
            }
        }
        return $trees;

    }

    public function multiMenu($_data, $parentid = null, $trees = NULL, $_params)
    {
        if (empty($parentid)) {
            $parmenu = !empty($_data['parent']) ? $_data['parent'] : [];
        } else {
            $parmenu = !empty($_data['list'][$parentid]) ? $_data['list'][$parentid] : [];
        }

        $route = "";

        if (count($parmenu) > 0) {
            if ($parentid == null) {
                $trees .= '<ul class="navmenu">';
            } else {
                $trees .= '<ul>';
            }
            foreach ($parmenu as $field) {
                if ($parentid != null) {
                    $trees .= '<li><a href="' . asset($route . $field['slug']) . '" title="' . $field['title'] . '">' . $field['title'] . '</a>';
                    $trees = $this->multiMenu($_data, $field['id'], $trees, $_params);
                    $trees .= '</li>';
                } else {
                    if (!in_array($field['type'], [\dataCategory::TYPE[3]])) {
                        $active = '';
                        if ($field['type'] == 'home') {
                            if (!empty($_params['active_menu']['active']) && $_params['active_menu']['active'] == 'home') $active = 'class="active"';
                            $trees .= '<li><a href="' . route('client.home') . '" title="Home" ' . $active . '>' . '<div class="text-center">' . $field['fontawesome_icon'] . '</div>' . 'Home</a>';
                        } elseif ($field['type'] == 'link') {
                            $trees .= '<li><a href="' . $field['url'] . '" target="_blank" title="' . $field['title'] . '">' . '<div class="text-center">' . $field['fontawesome_icon'] . '</div>' . $field['title'] . '</a>';
                        } else {
                            $trees .= '<li><a href="' . asset($route . $field['slug']) . '" title="' . $field['title'] . '">' . '<div class="text-center">' . $field['fontawesome_icon'] . '</div>' . $field['title'] . '</a>';
                        }
                    }
                    $trees = $this->multiMenu($_data, $field['id'], $trees, $_params);
                    $trees .= '</li>';
                }
            }
            $trees .= '</ul>';
        }
        return $trees;
    }

    public function multiCate($_parentid = null, $_trees = NULL)
    {
        $parmenu = self::findListParentId($_parentid);
        $_trees[$_parentid] = $_parentid;
        if (count($parmenu) > 0) {
            foreach ($parmenu as $field) {
                $_trees[$field->id] = $field->id;
                $_trees = $this->multiCate($field->id, $_trees);
            }
        }
        return $_trees;
    }

}
