@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <!-- WELCOME SECTION START -->
        <section class="welcome">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="welcome-title">👋 Hi, {{Auth::user()->name}} </h3>
                    <p class="welcome-text">"Welcome Type.ez! We're glad to have you here. Our platform is designed
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
                <h4 class="header-title">Use Cases</h4>
            </div>
            <div class="popular-template-body">

                <div class="template-wrapper">
                    @foreach ($cases as $case)
                        <a href="{{ route('content.create') }}?case={{ $case->id }}" class="template-card">
                            <figure class="card-img">
                                <img src="{{ asset($case->icon) }}" alt="{{ $case->title }}">
                            </figure>
                            <h3 class="card-title"> {{ $case->title }} </h3>
                            <p class="card-des">{{ $case->details }}</p>
                        </a>
                    @endforeach
                </div>


            </div>
        </section>
        <!-- POPULAR TEMPLATE  SECTION END -->

        <!-- MY PROJECT  SECTION START -->
        <section class="my-projects">

            <div class="my-projects-header">
                <h4 class="header-title">Saved Contents</h4>
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
                            <input type="hidden" id="multiuple-delete-url" value="{{route('contents-multiple-delete')}}">
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
                                <td>last Modified</td>
                                <td data-orderable="false"></td>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>

                </div>
            </div>

        </section>
        <!-- MY PROJECT  SECTION END -->
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
    </script>
@endsection
