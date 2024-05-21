<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info py-3">
                    <div class="inner">
                        <h3>
                            @if ($branch_id == 1)
                                {{ $totalCashOutAmountForToday }} Tk
                            @elseif(in_array($branch_id, [2, 3]))
                                {{ $totalCashOutAmountForToday }} INR
                            @elseif($branch_id == 4)
                                {{ $totalCashOutAmountForToday }} NPR
                            @else
                                {{ $totalCashOutAmountForToday }}
                            @endif
                        </h3>

                        <p>Today's Total Cashout Amount </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success py-3">
                    <div class="inner">
                        {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}

                        <h3>
                            @if ($branch_id == 1)
                                {{ $totalCashInAmountForToday }} Tk
                            @elseif(in_array($branch_id, [2, 3]))
                                {{ $totalCashInAmountForToday }} INR
                            @elseif($branch_id == 4)
                                {{ $totalCashInAmountForToday }} NPR
                            @else
                                {{ $totalCashInAmountForToday }}
                            @endif
                        </h3>

                        <p>Today's Total CashIn Amount </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning p-3">
                    <div class="inner">
                        <h3>
                            @if ($branch_id == 1)
                                {{ $totalCashOutAmountForThisMonth }} Tk
                            @elseif(in_array($branch_id, [2, 3]))
                                {{ $totalCashOutAmountForThisMonth }} INR
                            @elseif($branch_id == 4)
                                {{ $totalCashOutAmountForThisMonth }} NPR
                            @else
                                {{ $totalCashOutAmountForThisMonth }}
                            @endif
                        </h3>

                        <p class="text-white">Total Cashout for This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger p-3">
                    <div class="inner">
                        <h3>
                            @if ($branch_id == 1)
                                {{ $totalCashInAmountForThisMonth }} Tk
                            @elseif(in_array($branch_id, [2, 3]))
                                {{ $totalCashInAmountForThisMonth }} INR
                            @elseif($branch_id == 4)
                                {{ $totalCashInAmountForThisMonth }} NPR
                            @else
                                {{ $totalCashInAmountForThisMonth }}
                            @endif
                        </h3>

                        <p class="text-white">Total Cash-In for This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger p-3">
                    <div class="inner">
                        <h3>
                            @if ($branch_id == 1)
                                {{ $netAmountForThisMonth }} Tk
                            @elseif(in_array($branch_id, [2, 3]))
                                {{ $netAmountForThisMonth }} INR
                            @elseif($branch_id == 4)
                                {{ $netAmountForThisMonth }} NPR
                            @else
                                {{ $netAmountForThisMonth }}
                            @endif
                        </h3>

                        <p class="text-white">Net Amount for This Month</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger p-3">
                    <div class="inner">
                        <h3>
                            <h3>
                                @if ($branch_id == 1)
                                    {{ $totalNetAmount }} Tk
                                @elseif(in_array($branch_id, [2, 3]))
                                    {{ $totalNetAmount }} INR
                                @elseif($branch_id == 4)
                                    {{ $totalNetAmount }} NPR
                                @else
                                    {{ $totalNetAmount }}
                                @endif
                            </h3>
                        </h3>
                        <p class="text-white">Total Net Amount</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
