@extends('layout')
@section('content')			
	
				<div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h2>會員管理</h2><Br/>
                                    @if ($message = Session::get('success'))
                                        <script>alert('{{$message}}')</script>
                                    @endif  
									 <div class="row">
									<a href="{{route('member.create')}}" ><button type="button" class="col-lg-2 btn btn-primary btn-flat btn-addon m-b-10 m-l-20"><i class="ti-plus"></i>新增會員 </button></a>
									<div class="basic-form col-lg-8"  style="float:right;">
                                        <form method="get" action="{{route('member.index')}}" >
                                       
                                            <div class="form-group">
                                                
                                                <div class="input-group input-group-default">
                                                @csrf  
                                                    <input type="text" name="Search" class="form-control" placeholder="Search Round">
                                                    <span class="input-group-btn"><button  type="submit" class="btn btn-primary btn-group-right"><i class="ti-search"></i> 查詢</button></span>
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
                                                <th>會員編號</th>
                                                <th>會員姓名</th>
                                                <th>會員密碼</th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($member as $members)   
                                            <tr>
                                                <th scope="row">{{$members->mid}}</th>
                                                <td>{{$members->name}}</td>
                                                <td>{{$members->passwd}}</td>
                                                <form id="{{$members->mid}}" action="{{route('member.destroy',$members->mid)}}" method="post" >            
                                                <td><a href="{{route('member.edit',$members->mid)}}" ><button type="button" class="btn btn btn-info btn btn-flat btn-addon btn-sm m-b-5 m-l-5"><i class="ti-pencil-alt"></i>修改</button></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="javascript:deleteConfirm('{{$members->mid}}')" class="btn btn btn-default btn btn-flat btn-addon btn-sm m-b-5 m-l-5" ><i class="ti-trash"></i>刪除</button></td>
                                               </form>
                                            </tr>
                                        @endforeach
                                        <tr><td colspan="4">
                                        {!! $member->links() !!}    
                                        </td></tr> 
                                        </tbody>
                                       
                                    </table>
                                </div>
								
						
								
                            </div>
                        </div><!-- /# column --> 						
@endsection				
