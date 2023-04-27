@extends('layouts.app')
@section('title','Contents History')
@section('breadcrumb')
<li class="breadcrumb-item active">Contents History</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <div class="row g-4">
        <div class="col-md-12">
            <section class="my-projects">

                <div class="my-projects-header border-bottom">
                    <h4 class="header-title">Content History </h4>
                    <div class="project-button pull-right">

                        <a href="{{ route('content.create') }}" class="seeall-btn d-flex">
                            <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_582_23196)">
                                        <path
                                            d="M7.99967 14.6668C11.6816 14.6668 14.6663 11.6821 14.6663 8.00016C14.6663 4.31826 11.6816 1.3335 7.99967 1.3335C4.31778 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.6821 4.31778 14.6668 7.99967 14.6668Z"
                                            stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8 5.3335V10.6668" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_582_23196">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <span class="mt-1">New</span>
                        </a>
                    </div>
                </div>
                <div class="my-projects-body">
                    <div class="project-table-wrapper no-default-search p-3">

                        <div class="searchbox">
                            <span class="search-icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </span>
                            <input type="text" name="" id="search-datatable" placeholder="Search post here">

                            <div class="right-text" id="delete-selected" style="display: none" role="button"
                                onclick=multipleDelete()>
                                <span>Delete</span>
                                <span class="selected">selected <span class="total-selected"> </span> </span>
                                <span> Contents </span>
                                <input type="hidden" id="multiuple-delete-url"
                                    value="{{route('content-history.multiple-delete')}}">
                            </div>
                        </div>

                        <table id="datatables" class="project-table table">
                            <thead>
                                <tr>
                                    <td data-orderable="false">

                                        <div class="customcheck mb-2">
                                            <input type="checkbox" id="allSelect" class="customcheck-box"
                                                name="row-check" hidden>
                                            <label for="allSelect" class="customcheck-label"></label>
                                        </div>

                                    </td>
                                    <td>Title</td>
                                    <td> Use Case </td>
                                    <td>Words </td>
                                    <td data-orderable="false">Action</td>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
//Checked all Checkbox 
$('#allSelect').change(function() {
    $('#datatables .input-checkbox').prop('checked', $(this).prop('checked'));
    applicantSelected();
});
// Checkbox action
$(document).on("click", "#datatables .input-checkbox", function() {
    applicantSelected();
})
// applicant selected
function applicantSelected() {
    let numChecked = $('#datatables .input-checkbox:checked').length;
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
    $('#datatables .input-checkbox:checked').each(function() {
        deleteId.push($(this).val())
    })
    let id = deleteId.toString();
    let url = $('#multiuple-delete-url').val();
    url += '?id=' + id;
    console.log(url);
    resourceDelete(url);
}


$(function() {
    let table = $('#datatables').DataTable({
        info: false,
        sDom: 'Rfrtlip',
        processing: true,
        serverSide: true,
        ordering: true,
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
        ajax: {
            url: "{{ route('content-history.all') }}"
        },

        columns: [{
                data: 'checkbox'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'use_case_title',
                name: 'useCase.title'
            },
            {
                data: 'word_count',
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
</script>
@endsection