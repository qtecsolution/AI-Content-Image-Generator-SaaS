@extends('frontend.app')
@section('content')
    <section class="blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="blogdetail-row">


                        <div class="content">
                            <p class="date">
                                <span class="icon">
                                    <img src="{{asset('assets/icons/calendar.svg')}}">
                                </span>
                                {{ date('jS F, Y', strtotime($blog->created_at)) }}
                                <a href="#" class="mx-3">
                                <span class="icon">
                                    <img src="{{asset('assets/icons/folder.svg')}}">
                                </span>
                                {{$blog->category->name ?? ''}}
                                </a>
                            </p>

                            <h1 class="blog-title"> {{ $blog->title }} </h1>

                            <div class="top-content">
                                @php echo $blog->description @endphp
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        // blog scroll 

        // get all the links in the table of contents
        const tocLinks = document.querySelectorAll('.toclist-link');

        // for each link, add a scroll event listener
        tocLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // prevent the default behavior of the link
                e.preventDefault();

                // get the target section's ID from the link's href attribute
                const targetId = link.getAttribute('href');

                // get the corresponding section element
                const targetSection = document.querySelector(targetId);

                // scroll to the target section
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // add a scroll event listener to the window
        // add a scroll event listener to the window
        window.addEventListener('scroll', () => {
            // get the current scroll position
            const scrollPosition = window.scrollY;

            // loop through all the section elements
            const sections = document.querySelectorAll('div[id^="section-"]');
            sections.forEach(section => {
                // get the section's top and bottom positions relative to the viewport
                const sectionTop = section.offsetTop - 100;
                const sectionBottom = sectionTop + section.offsetHeight;

                // get the corresponding link element
                const link = document.querySelector(`.toclist-link[href="#${section.id}"]`);

                // get the parent li element of the link
                const parentLi = link.parentElement;

                // if the scroll position is within the section's bounds, add the "active" class to the parent li element
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    parentLi.classList.add('active');
                } else {
                    parentLi.classList.remove('active');
                }
            });
        });
    </script>
@endsection
