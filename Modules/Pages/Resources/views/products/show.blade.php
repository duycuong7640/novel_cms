@extends('pages::layouts.master')

@section('content')
    <div class="wrap-novel-show bg-opacity radius">
        @include('pages::elements.breadcrumb')
        <h1 class="title">The System is Four Years Ahead of Schedule, But Weird is Still a Cub</h1>
        <div class="img">
            <i class="cover"
               style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
        </div>
        <div class="show-star">
            <p class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                4.5
            </p>
        </div>
        <div class="show-button-action">
            <button type="button" class="radius-tiny">
                <a href="" title="">
                    Reading <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </button>
            <button type="button" class="radius-tiny">
                <a href="" title="">
                    Add Library
                </a>
            </button>
        </div>
    </div>
    <div class="wrap-tab-content">
        <ul class="tabs">
            <li class="active" data-target="info">
                <i class="far fa-question-circle"></i> Info
            </li>
            <li data-target="chapters">
                <i class="fas fa-list"></i> Chapters
            </li>
            <li data-target="reviews">
                <i class="far fa-star"></i> Reviews
            </li>
        </ul>
    </div>
    <div class="wrap-novel-show">
        <div id="info">
            <div class="show-info-button">
                <button type="button" class="radius">
                    <p>8.9k</p>
                    <p class="label">Views</p>
                </button>
                <button type="button" class="radius">
                    <p>121</p>
                    <p class="label">Chapters</p>
                </button>
                <button type="button" class="radius">
                    <p>47</p>
                    <p class="label">Readers</p>
                </button>
            </div>
            <div class="show-info-content">
                <p>[Kill level 4 weirdos (characteristic: silent), you can redeem 3000 system points, or the system can
                    be devoured to extract characteristics! 】
                </p>
                <p>
                    Chen Ge listened to the voice in his mind and looked at the wild cat that was killed by his own
                    hands. His expression was a little subtle for a moment.
                </p>
                <p>
                    Returning to the community, looking at the friendly security guard, the system prompt sounded in
                    Shen Ge’s mind again——
                </p>
                <p>
                    【warn! Found a level 5 weirdness (Characteristics: three heads and six arms), detected that the
                    host’s current strength is definitely no match for him, please flee the scene quickly! 】
                </p>
                <p>
                    For a moment, looking at the oranges handed over by the security guard, Shen Ge didn’t know whether
                    he should accept them or not.
                </p>
                <p>
                    The next day, Shen Ge went to the supermarket and bought a box of instant noodles and some snacks.
                </p>
                <p>
                    [The host sneaked into the mysterious and haunted area of ​​Level 6 and collected a large amount of
                    supplies. His courage was astonishing and he was rewarded with 1,000 system points! 】
                </p>
                <p>
                    Shen Ge was about to scan the QR code to pay, but his hands froze in mid-air…
                </p>
            </div>
            <div class="show-info-detail">
                <label class="title">Details</label>
                <div class="list-if">
                    <ul>
                        <li>Short Title</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Alternate Title</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Status [Edit]</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Author</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Genre</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Weekly Rank</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Monthly Rank</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>All Time Rank</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                    <ul>
                        <li>Tags [Edit]</li>
                        <li>:</li>
                        <li>TSFYAS</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="chapters" style="display: none;">
            <label class="recent-chapters">Recent Chapters</label>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @for($i = 0; $i<=20; $i ++)
                                <a href="" title="">
                                    <ul>
                                        <li>
                                            Chapter 10700
                                        </li>
                                        <li>
                                            You killed "Level 2 Strange (Characteristic: Two Headed
                                        </li>
                                        <li>10 hours ago</li>
                                    </ul>
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                            the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You
                            can
                            modify any of this with custom CSS or overriding our default variables. It's also worth
                            noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the
                            transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You
                            can
                            modify any of this with custom CSS or overriding our default variables. It's also worth
                            noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the
                            transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="reviews" style="display: none;"></div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tabs li');
            const contents = document.querySelectorAll('.wrap-novel-show > div');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to the clicked tab
                    tab.classList.add('active');

                    // Hide all content divs
                    contents.forEach(content => content.style.display = 'none');
                    // Show the content div that corresponds to the clicked tab
                    const target = tab.getAttribute('data-target');
                    document.getElementById(target).style.display = 'block';
                });
            });
        });
    </script>
@endsection
