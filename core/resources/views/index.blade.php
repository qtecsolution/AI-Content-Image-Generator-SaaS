@extends('layouts.app')
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <!-- WELCOME SECTION START -->
    <section class="welcome">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="welcome-title">👋 Hi, {{ Auth::user()->name }} </h3>
                <p class="welcome-text">"Welcome to {{readConfig('name')}}! We're glad to have you here. Our platform is designed
                    to help you streamline <br> your writing process, increase your productivity, and create
                    high-quality content. <br> We're confident you'll find the tools and features here to be
                    user-friendly and effective.</p>
            </div>
        </div>
    </section>
    <!-- WELCOME SECTION END -->
    <!-- POPULAR TEMPLATE  SECTION START -->
    <section class="popular-template">
        <div class="popular-template-header">
            <h4 class="header-title">Popular Use Case Templates</h4>
        </div>
        <div class="popular-template-body">
            <div class=" swiper templateSwiper">
                <div class="swiper-wrapper pb-5">
                    @foreach ($cases as $case)
                    <div class="swiper-slide">
                        <a href="{{ route('content.create') }}?case={{ $case->id }}" class="template-card">
                            <figure class="card-img">
                                <img src="{{ asset($case->icon) }}" alt="{{ $case->title }}">
                            </figure>
                            <h3 class="card-title"> {{ $case->title }} </h3>
                            <p class="card-des">{{ $case->details }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
    </section>
    <!-- POPULAR TEMPLATE  SECTION END -->

    <!-- MY PROJECT  SECTION START -->
    <section class="my-projects">

        <div class="my-projects-header">
            <h4 class="header-title">Saved Contents </h4>
        </div>

        <div class="my-projects-body">
            <div class="project-table-wrapper no-default-search p-3">

                <div class="searchbox">
                    <span class="search-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    </span>
                    <input type="text" name="" id="search-datatable" placeholder="search post here">

                    <div class="right-text" id="delete-selected" style="display: none" role="button"
                        onclick=multipleDelete()>
                        <span>Delete</span>
                        <span class="selected">selected <span class="total-selected"> </span> </span>
                        <span> Contents </span>
                        <input type="hidden" id="multiuple-delete-url" value="{{ route('contents-multiple-delete') }}">
                    </div>
                </div>

                <table id="projectTable" class="project-table">
                    <thead>
                        <tr class="bg-white">
                            <td data-orderable="false" class="bg-danger px-4">
                                <div class="customcheck mb-2">
                                    <input type="checkbox" id="allSelect" class="customcheck-box" name="row-check"
                                        hidden>
                                    <label for="allSelect" class="customcheck-label"></label>
                                </div>
                            </td>
                            <td>Title</td>
                            <td>Keywords </td>
                            <td> Use Case </td>
                            <td>Words </td>
                            <td>Last Modified</td>
                            <td data-orderable="false"></td>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>

            </div>
        </div>

    </section>
    <!-- MY PROJECT  SECTION END -->
    <!-- Free Plan Subscribe in first time registration -->
    <form action="{{ route('plan.purchase.store') }}" method="post" id="order_payment_done">
        @csrf
        <input type="hidden" name="plan_id" value="{{ freePlan()->id }}">
        <input type="hidden" name="paymentMethod" value="Free">
        <input type="hidden" name="paymentAmount" value="{{ freePlan()->price }}">
        <input type="hidden" name="paymentTID" value="">
        <input type="hidden" name="value_1" value="">

        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
        <input type="hidden" name="address" value="{{ Auth::user()->address }}">
        <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
    </form>
    
</div>
@endsection
@section('script')
<script type="text/javascript">
var swiper = new Swiper(".templateSwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        420: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1100: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1300: {
            slidesPerView: 5,
            spaceBetween: 8,
        },
    },
});
//Checked all Checkbox 
$('#allSelect').change(function() {
    $('#projectTable .input-checkbox').prop('checked', $(this).prop('checked'));
    applicantSelected();
});
// Checkbox action
$(document).on("click", "#projectTable .input-checkbox", function() {
    applicantSelected();
})
// applicant selected
function applicantSelected() {
    let numChecked = $('#projectTable .input-checkbox:checked').length;
    if (numChecked > 0) {
        $('#delete-selected').show();
        $('#delete-selected .total-selected').html(numChecked);
    } else {
        $('#delete-selected').hide();
    }
}
// multiple delete 
function multipleDelete() {
    let deleteId = [];
    $('#projectTable .input-checkbox:checked').each(function() {
        deleteId.push($(this).val())
    })
    let id = deleteId.toString();
    let url = $('#multiuple-delete-url').val();
    url += '?id=' + id;
    resourceDelete(url);
}


$(function() {
    let table = $('#projectTable').DataTable({
        info: false,
        sDom: 'Rfrtlip',
        language: {
            paginate: {
                next: ` <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.16699 7.00008H12.8337M12.8337 7.00008L7.00033 1.16675M12.8337 7.00008L7.00033 12.8334" stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> `,
                previous: `<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8337 7.00008H1.16699M1.16699 7.00008L7.00033 12.8334M1.16699 7.00008L7.00033 1.16675" stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>`,
            },
            "lengthMenu": "Show _MENU_ entries ",
            pageLength: 10,
        },
        fixedColumns: {
            left: 1,
        },
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: "{{ route('contents.create') }}"
        },

        columns: [{
                data: 'checkbox'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'keywords',
                name: 'keywords'
            },
            {
                data: 'use_case_title',
                name: 'useCase.title'
            },
            {
                data: 'word_count',
            },
            {
                data: 'last_modify',
                name: 'updated_at'
            },
            {
                data: 'action'
            },
        ]
    });

    $('#search-datatable').keyup(function() {
        table.search(this.value).draw();

    })
});
if("{{$noPlan}}"==1){
    $('#order_payment_done').submit();
}
</script>
@endsection