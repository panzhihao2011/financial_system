@extends('layouts.nav')
@section('content')
  <section class="vbox">
    <section class="scrollable padder">
        <marquee direction=left class="headerMarquee">欢迎使用xxx房产记账结算管理系统！</marquee>
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><i class="fa fa-home"></i> 主页</li>
        <li class="active">基本工资明细</li>
      </ul>
      <section class="panel panel-default">
        <div class="table-responsive" >
        <table class="headerStyle">
            <tr>
                <th class="headertitle" data-toggle="class">
                  基本工资明细
                </th>
            </tr>
        </table>
         <!--显示店铺基本信息-->
        <table class="table table-striped b-t b-light text-sm headerStyle2" id="myTable">
              <tr>
                <th>
                    <label class="labelStyle">查找店铺&nbsp;&nbsp;</label>
                    <select class="input-sm form-control input-s-sm inline" id="searchstore">
                        @foreach($store as $s)
                            @if ($store_code == $s->code)
                                <option value="{{ $s->code }}" selected>{{ $s->name }}</option>
                            @else
                                <option value="{{ $s->code }}" >{{ $s->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </th>
                <th>
                    <label class="labelStyle">季度查询&nbsp;&nbsp;</label>
                    <select class="input-sm form-control input-s-sm inline" id="season_year">
                    @if(count($years) > 0)
                        @foreach($years as $y)
                            @if($year == $y->year)
                                <option value="{{ $y->year }}" selected>{{ $y->year }}</option>
                            @else 
                                <option value="{{ $y->year }}">{{ $y->year }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="{{ $year }}" selected>{{ $year }}</option>
                    @endif
                    </select>
                    <select class="input-sm form-control input-s-sm inline" id="searchseason">
                        <option value="0">请选择</option>
                        <option value="1">第一季度</option>
                        <option value="2">第二季度</option>
                        <option value="3">第三季度</option>
                        <option value="4">第四季度</option>
                    </select>
                </th>
                <th>
                    <label class="labelStyle ">年 / 月&nbsp;&nbsp;</label>  
                    <select class="input-sm form-control input-s-sm inline" id="year">
                    @if(count($years) > 0)
                        @foreach($years as $y)
                            @if($year == $y->year)
                                <option value="{{ $y->year }}" selected>{{ $y->year }}</option>
                            @else 
                                <option value="{{ $y->year }}">{{ $y->year }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="{{ $year }}" selected>{{ $year }}</option>
                    @endif
                    </select>
                    <select class="input-sm form-control input-s-sm inline" id="month">
                        @for($i = 1; $i < 13 ; $i++)
                            @if($month == $i)
                                <option value="{{ $i }}" selected>{{ $i }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </th>
          
              </tr>
        </table>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light text-sm">
            <thead>
              <tr>
                <th>所属店铺 </th>
                <th>年</th>
                <th>月</th>
                <th>姓名</th>
                <th>员工编号</th>
                <th>职位</th>
                <th>基本工资</th>
              </tr>
            </thead>
            <tbody>
                @foreach($salary_details as $list)
                <tr>
                    <td>{{ $list->store->name }}</td>
                    <td>{{ $list->year }}</td>
                    <td>{{ $list->month }}</td>
                    <td>{{ $list->employee->name }}</td>
                    <td>{{ $list->employee_code }}</td>      
                    <td>{{ $list->position->name }}【{{ $list->position->position_tag }}】</td>                               
                    <td>{{ $list->salary_amount }}</td>
                </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
            @if($salary_details)
                <div>{!! $salary_details->links() !!}</div>
            @endif
      </section>
    <div class="copyRight">
        <div >版权所有: © locqj
        </div>
    </div>
    </section>
  </section>
  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
  <script src="http://qrcode.565tech.com/static/admin/js/app.v2.js"></script>
<script>
    $(document).ready(function(){
        $('#searchstore').change(function(event) {
            var month = $('#month').val();
            var year = $('#year').val();
            var store_code = $('#searchstore').val();
            window.location.href = '/search/salarydetails/'+store_code+'-'+year+'-'+month;
        });
        $('#year').change(function(event) {
            var month = $('#month').val();
            var year = $('#year').val();
            var store_code = $('#searchstore').val();
            window.location.href = '/search/salarydetails/'+store_code+'-'+year+'-'+month;
            
        });
        $('#month').change(function(event) {
            var month = $('#month').val();
            var year = $('#year').val();
            var store_code = $('#searchstore').val();
            window.location.href = '/search/salarydetails/'+store_code+'-'+year+'-'+month;
        });
         /*季度搜索*/
        $('#searchseason').change(function(event) {
            var season =$('#searchseason').val();
            var store_code = $('#searchstore').val();
            var season_year = $('#season_year').val();
            window.location.href = '/search/salarydetails/'+season+'/'+store_code+'/'+season_year;
        });
    });
</script>
@endsection