@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
<div class="header bg-blue py-7 py-lg-5">
</div>
<div class="container-employee  pb-5">
    <h1 class="text-white display-3 emp-heading">Employee Management Tool</h1>
    <p class="text-light">Get the best out of your data in simple clicks</p>
    <br>
    <button type="button" class="btn btn-success action-btn" data-toggle="modal" data-target="#exampleModal">
    <i class="ni ni-circle-08"></i> Add Employee
    </button>

    <button type="button" class="btn btn-info action-btn" data-toggle="modal" data-target="#exampleModal">
        <i class="ni ni-chart-bar-32"></i> Stats
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Create a new employee</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select role</option>
                                <option value="1">Admin</option>
                                <option value="2">Support</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Job Position</th>
                <th>Since</th>
                <th class="text-right">Salary</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Andrew Mike</td>
                <td>Develop</td>
                <td>2013</td>
                <td class="text-right">&euro; 99,225</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>John Doe</td>
                <td>Design</td>
                <td>2012</td>
                <td class="text-right">&euro; 89,241</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                        title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Alex Mike</td>
                <td>Design</td>
                <td>2010</td>
                <td class="text-right">&euro; 92,144</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Alex Mike</td>
                <td>Design</td>
                <td>2010</td>
                <td class="text-right">&euro; 92,144</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Alex Mike</td>
                <td>Design</td>
                <td>2010</td>
                <td class="text-right">&euro; 92,144</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Alex Mike</td>
                <td>Design</td>
                <td>2010</td>
                <td class="text-right">&euro; 92,144</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Alex Mike</td>
                <td>Design</td>
                <td>2010</td>
                <td class="text-right">&euro; 92,144</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-circle-08 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-settings-gear-65 pt-1"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple"
                        data-original-title="" title="">
                        <i class="ni ni-fat-remove pt-1"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush