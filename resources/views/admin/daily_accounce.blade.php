 @extends('layouts.master')

@section('top_header')
  Accounce Cost Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!--Daily Income start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Income on {{ $date }}
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Invoice ID</th>
              <th>Taka</th>
              <th>User</th>
            </tr>
          </thead>
          @php 
            $totalIncome = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($daily_incomes as $daily_income)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $daily_income->invoice_out_id }}</td>
              <td>{{ $daily_income->taka }} /-</td>
              <td style="text-transform: capitalize;">{{ $daily_income->user->name}}</td>
                  @php 
                  $totalIncome = $daily_income->taka+ $totalIncome @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIncome}} Tk.</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily Income end -->

<!--Daily cost in accounce start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Accounce Cost on {{ $date }}
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Particular</th>
              <th>Taka</th>
            </tr>
          </thead>
          @php 
            $totalCost = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($accounce_costs as $accounce_cost)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $accounce_cost->name }}</td>
              <td>{{ $accounce_cost->taka }} /-</td> 
                  @php 
                  $totalCost = $accounce_cost->taka+ $totalCost @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalCost }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily cost in accounce end -->

  <!--Total balance start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         Total balance on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Taka</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ "Total Outdoor Income" }}</td>
              <td>{{ $totalIncome }} /-</td>
            </tr>
            <tr>
              <td>{{ "Total Cost "}}</td>
              <td>{{ $totalCost }} /-</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Net Balance</th>
              <th>{{ $totalIncome - $totalCost }} /-</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Total balance end -->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection