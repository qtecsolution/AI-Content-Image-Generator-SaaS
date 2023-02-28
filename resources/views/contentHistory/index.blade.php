@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active">Contents History</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header">
                        <h4 class="header-title">Content History</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('content.create') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-plus-circle"></i> New </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="project-table-wrapper no-default-search p-3">

                            <div class="searchbox">
                                <span class="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="" id="search-datatable">

                                <div class="right-text" id="delete-selected" style="display: none" role="button" onclick=multipleDelete()>
                                    <span>Delete</span>
                                    <span class="selected">selected <span class="total-selected"> </span> </span>
                                    <span> Contents </span>
                                    <input type="hidden" id="multiuple-delete-url" value="{{route('content-history.multiple-delete')}}">
                                </div>
                            </div>

                            <table id="datatables" class="project-table table">
                                <thead>
                                    <tr>
                                        <td data-orderable="false"> <input type="checkbox" name="row-check"
                                                class="form-check-input check-lg" id="allSelect"></td>
                                        <td>Title</td>
                                        <td>Keywords </td>
                                        <td> Use case </td>
                                        <td>Words </td>
                                        <td data-orderable="false"></td>
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
        function multipleDelete(){
            let deleteId = []; 
            $('#datatables .input-checkbox:checked').each(function(){
                deleteId.push($(this).val())
            })
            let id = deleteId.toString();
            let url = $('#multiuple-delete-url').val();
            url+='?id='+id;
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
