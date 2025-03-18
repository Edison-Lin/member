@extends('layout')
@section('content')
<div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h2>會員資料管理</h2><Br/>
                                    @if($message=Session::get('success'))
                                    <script>alert('{{$message}}')</script>
                                    @endif
									 <div class="row">
									<a href="{{route('member.create')}}" ><button type="button" class="col-lg-2 btn btn-primary btn-flat btn-addon m-b-10 m-l-20"><i class="ti-plus"></i>新增會員 </button></a>
									<div class="basic-form col-lg-8">
                                        <form>
                                            
                                            <div class="form-group">
                                                
                                                <div class="input-group input-group-default">
                                                    <input type="text" placeholder="Search Round" name="Search" class="form-control">
                                                    <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit"><i class="ti-search"></i> 查詢</button></span>
                                                </div>
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
									</div>
                                </div>
                                
								<div class="card-body">
                                    <table class="table table-responsive table-striped m-t-30">
                                        <thead>
                                            <tr style="border-top:1px solid #e7e7e7;">
                                                <th>會員帳號</th>
                                                <th>會員名稱</th>
                                                <th>密碼</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($member as $data)
                                            <tr>
                                                <th scope="row">{{$data->mid}}</th>
                                                <td>{{$data->mname}}</td>
                                                <td>{{$data->passwd}}</td>
                                                
                                               <td>
                                                <a href="{{route('member.edit',$data->mid)}}">
                                                    <button type="button" class="btn btn btn-info btn btn-flat btn-addon btn-sm m-b-5 m-l-5"><i class="ti-pencil-alt"></i>
                                                        修改
                                                    </button>
                                                </a>
                                                <form action="{{route('member.destroy',$data->mid)}}" id="{{$data->mid}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="button" class="btn btn btn-default btn btn-flat btn-addon btn-sm m-b-5 m-l-5" onclick="deleteConfirm('{{$data->mid}}')">
                                                            <i class="ti-trash"></i>刪除
                                                        </button>
                                                    
                                                </form>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td colspan="4">
                                                    {!! $member->links() !!}
                                                </td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /# column -->
@endsection