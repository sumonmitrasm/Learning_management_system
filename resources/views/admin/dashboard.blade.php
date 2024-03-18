@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">Sales Dashboard</h4>
            </div>
            <div class="page-rightheader ms-auto d-lg-flex d-none">
               <div class="ms-5 mb-0">
                  <a class="btn btn-white date-range-btn" href="javascript:void(0)" id="daterange-btn">
                     <svg class="header-icon2 me-3" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path d="M5 8h14V6H5z" opacity=".3"/>
                        <path d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z"/>
                     </svg>
                     <span>Select Date
                     <i class="fa fa-caret-down"></i></span>
                  </a>
               </div>
            </div>
         </div>
         <!--End Page header-->
         <!--Row-->
         <div class="row">
            <div class="col-xl-9 col-md-12 col-lg-12">
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                              <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                              <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                           </svg>
                           <p class=" mb-1 ">All Orders</p>
                           <h2 class="mb-1 font-weight-bold">3257</h2>
                           <span class="mb-1 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 43.2</span> than last month</span>
                           <div class="progress progress-sm mt-3 bg-success-transparent">
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 78%"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <svg class="card-custom-icon text-secondary icon-dropshadow-secondary" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                              <path opacity=".0" d="M12.07,6.01 C8.2,6.01 5.07,9.14 5.07,13.01 C5.07,16.88 8.2,20.01 12.07,20.01 C15.94,20.01 19.07,16.88 19.07,13.01 C19.07,9.14 15.94,6.01 12.07,6.01 Z M13.07,14.01 L11.07,14.01 L11.07,8.01 L13.07,8.01 L13.07,14.01 Z"></path>
                              <path d="M9.07,1.01 L15.07,1.01 L15.07,3.01 L9.07,3.01 L9.07,1.01 Z M11.07,8.01 L13.07,8.01 L13.07,14.01 L11.07,14.01 L11.07,8.01 Z M19.1,7.39 L20.52,5.97 C20.09,5.46 19.62,4.98 19.11,4.56 L17.69,5.98 C16.14,4.74 14.19,4 12.07,4 C7.1,4 3.07,8.03 3.07,13 C3.07,17.97 7.09,22 12.07,22 C17.05,22 21.07,17.97 21.07,13 C21.07,10.89 20.33,8.93 19.1,7.39 Z M12.07,20.01 C8.2,20.01 5.07,16.88 5.07,13.01 C5.07,9.14 8.2,6.01 12.07,6.01 C15.94,6.01 19.07,9.14 19.07,13.01 C19.07,16.88 15.94,20.01 12.07,20.01 Z"></path>
                           </svg>
                           <p class=" mb-1 ">Pending Orders</p>
                           <h2 class="mb-1 font-weight-bold">1658</h2>
                           <span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 19.8</span> than last month</span>
                           <div class="progress progress-sm mt-3 bg-secondary-transparent">
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width: 58%"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <svg class="card-custom-icon text-primary icon-dropshadow-primary" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                              <path d="M17.65,6.35 C16.2,4.9 14.21,4 12,4 C7.58,4 4.01,7.58 4.01,12 C4.01,16.42 7.58,20 12,20 C15.73,20 18.84,17.45 19.73,14 L17.65,14 C16.83,16.33 14.61,18 12,18 C8.69,18 6,15.31 6,12 C6,8.69 8.69,6 12,6 C13.66,6 15.14,6.69 16.22,7.78 L13,11 L20,11 L20,4 L17.65,6.35 Z"></path>
                           </svg>
                           <p class=" mb-1 ">Refund Request</p>
                           <h2 class="mb-1 font-weight-bold">168</h2>
                           <span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.8%</span> than last month</span>
                           <div class="progress progress-sm mt-3 bg-primary-transparent">
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 58%"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-12 col-md-12 col-lg-12">
                     <div class="card overflow-hidden">
                        <div class="row">
                           <div class="col-xl-8 col-md-12 col-lg-7 pb-5">
                              <div class="card-header pb-50  border-0">
                                 <h4 class="card-title">Country Base Profit</h4>
                              </div>
                              <div id="vmap" class="vmap-width"></div>
                           </div>
                           <div class="col-xl-4 col-md-12 col-lg-5 pt-3 country-profit">
                              <div class="countryscroll">
                                 <table class="table countrytable">
                                    <tbody>
                                       <tr>
                                          <td class="w-1 text-center ps-5"><i class="flag flag-us "></i></td>
                                          <td>USA </td>
                                          <td class="text-end"><span class="font-weight-bold">$519.75</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-cn "></i></td>
                                          <td>China </td>
                                          <td class="text-end"><span class="font-weight-bold">$248.07</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-de "></i></td>
                                          <td>Germany </td>
                                          <td class="text-end"><span class="font-weight-bold">$190.57</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-ru "></i></td>
                                          <td>Russia </td>
                                          <td class="text-end"><span class="font-weight-bold">$173.25</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-in "></i></td>
                                          <td>India </td>
                                          <td class="text-end"><span class="font-weight-bold">$63.00</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-cn"></i></td>
                                          <td>China</td>
                                          <td class="text-end"><span class="font-weight-bold">$13.00</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-pk"></i></td>
                                          <td>Pakisthan</td>
                                          <td class="text-end"><span class="font-weight-bold">$43.19</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-ca"></i></td>
                                          <td>Canada</td>
                                          <td class="text-end"><span class="font-weight-bold">$56.19</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-ge"></i></td>
                                          <td>Germany</td>
                                          <td class="text-end"><span class="font-weight-bold">$49.00</span></td>
                                       </tr>
                                       <tr>
                                          <td class="w-1 text-center ps-5"><i class="flag flag-us "></i></td>
                                          <td>USA </td>
                                          <td class="text-end"><span class="font-weight-bold">$519.75</span></td>
                                       </tr>
                                       <tr>
                                          <td class="ps-5"><i class="flag flag-cn "></i></td>
                                          <td>China </td>
                                          <td class="text-end"><span class="font-weight-bold">$248.07</span></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-12 col-lg-6">
               <div class="card">
                  <div class="d-block mt-4 card-header border-0 text-center">
                     <h2 class="text-center">Congratulations <b>John!</b></h2>
                  </div>
                  <div class="card-body">
                     <div class="row text-center">
                        <div class="col-md-12">
                           <img src="{{ asset('admin/assets/images/photos/award.png') }}" alt="img" class="sales-img">
                           <h2 class="mb-0 mt-4 fs-40 counter font-weight-bold">$1000k</h2>
                           <span class="text-muted"><span class="text-green me-1"><i class="fe fe-arrow-up ms-1"></i>0.82%</span> since last year</span>
                           <p class="mt-5 mb-2 text-muted fs-18">You have done 99.9% target sales reached today. </p>
                           <small class="mt-1 text-muted">Today 20 minutes ago</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-6">
               <div class="row">
                  <div class="col-xl-4 col-md-12 col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col">
                                 <p class="mb-1">Today Revenue</p>
                                 <h2 class="mb-0 font-weight-bold">$897k</h2>
                              </div>
                              <div class="col col-auto">
                                 <div id="spark1"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-12 col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col">
                                 <p class="mb-1">Unique Visitors</p>
                                 <h2 class="mb-0 font-weight-bold">5,896</h2>
                              </div>
                              <div class="col col-auto">
                                 <div id="spark2"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-12 col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col">
                                 <p class="mb-1">Expenses</p>
                                 <h2 class="mb-0 font-weight-bold">$1,678</h2>
                              </div>
                              <div class="col col-auto">
                                 <div id="spark3"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--Row-->
         <div class="row row-deck">
            <div class="col-xxl-4 col-xl-5 col-lg-12">
               <div class="card overflow-hidden">
                  <div class="card-header">
                     <h3 class="card-title">Top Products</h3>
                  </div>
                  <div class="card-body">
                     <div class="scrollbar h-400" id="scrollbar">
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/1.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">Latest Books</h5>
                              <small class="text-muted">2,30,400 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/2.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">New Branded Shoes</h5>
                              <small class="text-muted">3,45,675 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/3.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">Beauty Makeup kit</h5>
                              <small class="text-muted">5,23,324 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/4.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">Headset</h5>
                              <small class="text-muted">1,42,400 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/5.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">New Modal Shoes</h5>
                              <small class="text-muted">3,30,400 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/1.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">Latest Books</h5>
                              <small class="text-muted">2,30,400 times</small>
                           </div>
                        </div>
                        <div class="d-flex mb-5">
                           <a href="javascript:void(0)" class="me-4">
                           <img class="w-8 h-8 rounded shadow" src="{{ asset('admin/assets/images/orders/2.jpg') }}" alt="media1">
                           </a>
                           <div class="mt-3">
                              <h5 class="mb-1 font-weight-semibold">New Branded Shoes</h5>
                              <small class="text-muted">3,45,675 times</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-8 col-xl-7 col-lg-12">
               <div class="card card-block">
                  <div class="card-header d-sm-flex d-block">
                     <h3 class="card-title">Earning Revenue</h3>
                     <div class="ms-auto mt-4 mt-sm-0">
                        <a class="btn btn-white" href="javascript:void(0)">Week</a>
                        <a class="btn btn-primary" href="javascript:void(0)">Month</a>
                        <a class="btn btn-white" href="javascript:void(0)">Year</a>
                        <div class="btn-group ms-3 mb-0">
                           <a href="javascript:void(0)" class="option-dots" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                           <div class="dropdown-menu p-0">
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-download me-2"></i> Download</a>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-cog me-2"></i> Settings</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="chart-container">
                        <canvas id="leads" class="h-400 chart-dropshadow-primary"></canvas>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-12">
               <div class="card overflow-hidden">
                  <div class="card-header">
                     <h3 class="card-title">New Transactions</h3>
                     <div class="card-options ">
                        <div class="btn-group ms-3 mb-0">
                           <a href="javascript:void(0)" class="option-dots" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0)">Today</a>
                              <a class="dropdown-item" href="javascript:void(0)">Last Week</a>
                              <a class="dropdown-item" href="javascript:void(0)">Last Month</a>
                              <a class="dropdown-item" href="javascript:void(0)">Last Year</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-cog me-2"></i> Settings</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="h-400 scrollbar2" id="scrollbar2">
                        <div class="table-responsive">
                           <table class="table transaction-table mb-0 text-nowrap">
                              <thead>
                                 <tr class="bold">
                                    <th class="border-bottom-0 w-200 d-block">Product</th>
                                    <th class="border-bottom-0">Transactions</th>
                                    <th class="border-bottom-0">Date &Time </th>
                                    <th class="border-bottom-0">Amount</th>
                                    <th class="border-bottom-0">Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/7.jpg') }}" alt="media1"> New Book</td>
                                    <td>#12323423</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-primary rounded-pill">Completed</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/8.jpg') }}" alt="media1"> New Bowl</td>
                                    <td>#26762768</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-warning rounded-pill">Pending</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/9.jpg') }}" alt="media1"> Modal Car</td>
                                    <td>#76273277</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-primary rounded-pill">Completed</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/10.jpg') }}" alt="media1"> Headset</td>
                                    <td>#67237267</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-danger rounded-pill">Declined</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/11.jpg') }}" alt="media1"> New Headset</td>
                                    <td>#561527167</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-danger rounded-pill">Declined</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/12.jpg') }}" alt="media1"> Watch</td>
                                    <td>#12323423</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-primary rounded-pill">Completed</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/13.jpg') }}" alt="media1"> Branded Shoes</td>
                                    <td>#26762768</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-warning rounded-pill">Pending</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/14.jpg') }}" alt="media1"> New Modal shoe</td>
                                    <td>#12323423</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-primary rounded-pill">Completed</span></td>
                                 </tr>
                                 <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/orders/5.jpg') }}" alt="media1"> Branded Shoes</td>
                                    <td>#26762768</td>
                                    <td>11th July, 10am</td>
                                    <td class="font-weight-bold">$13,206</td>
                                    <td><span class="badge bg-warning rounded-pill">Pending</span></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Recent Customers</h3>
                     <div class="card-options ">
                        <div class="btn-group ms-3 mb-0">
                           <a href="javascript:void(0)" class="option-dots" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0)">Last Week</a>
                              <a class="dropdown-item" href="javascript:void(0)">Last Month</a>
                              <a class="dropdown-item" href="javascript:void(0)">Yearly</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-cog me-2"></i> Settings</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="h-400 scrollbar3" id="scrollbar3">
                        <div class="table-responsive">
                           <table class="table transaction-table mb-0">
                              <tbody>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">John Wisely</h6>
                                          <small class="text-muted">1340 Gills Rd, VA, 23139</small>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/4.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">Nicki Fanning</h6>
                                          <small class="text-muted">408 1st St, NC, 28468</small>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/5.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">Lula Malone</h6>
                                          <small class="text-muted">104 Jefferson Ln, TN, 37643</small>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/2.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">Rina Summa</h6>
                                          <small class="text-muted">49 Scott Dr, NY, 10941</small>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/10.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">Yadira Acklin</h6>
                                          <small class="text-muted">507 E 22nd St S, IA, 50208</small>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="d-flex">
                                       <img class="w-7 h-7 rounded shadow me-3" src="{{ asset('admin/assets/images/users/12.jpg') }}" alt="media1">
                                       <div class="mt-2">
                                          <h6 class="mb-1 font-weight-semibold">Joanna Latta</h6>
                                          <small class="text-muted">511 N Walnut St, LA, 71082</small>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Best Sellers</h3>
                     <div class="card-options">
                        <div class="btn-group mb-0">
                           <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fe fe-plus"></i> Add New Order</button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-plus me-2"></i>Add new Order</a>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-eye me-2"></i>View all new tab</a>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-edit me-2"></i>Edit Page</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-cog me-2"></i> Settings</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered text-nowrap" style="width:100%">
                           <thead>
                              <tr class="bold">
                                 <th class="border-bottom-0">Seller </th>
                                 <th class="border-bottom-0">Total Sales</th>
                                 <th class="border-bottom-0">Active Stocks</th>
                                 <th class="border-bottom-0">Category</th>
                                 <th class="border-bottom-0">Revenue</th>
                                 <th class="text-center border-bottom-0">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="font-weight-bold">SREE Enrprices</td>
                                 <td>20,125</td>
                                 <td>10513.00</td>
                                 <td>Watch</td>
                                 <td class="font-weight-bold">$13,206</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Granite Cake</td>
                                 <td>1,250,103</td>
                                 <td>425.25</td>
                                 <td>Medical</td>
                                 <td class="font-weight-bold">$21,762</td>
                                 <td><i class="fa fa-caret-down text-success me-1"></i>.05%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">GOODS Best</td>
                                 <td>425.25</td>
                                 <td>1.2029</td>
                                 <td>Cake</td>
                                 <td class="font-weight-bold">$42,282</td>
                                 <td><i class="fa fa-caret-down text-success me-1"></i>.05%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Multi Shop</td>
                                 <td>28,470</td>
                                 <td>1547.67</td>
                                 <td>Elactronics</td>
                                 <td class="font-weight-bold">$86,334</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Sagar Limited</td>
                                 <td>24,983</td>
                                 <td>723.48</td>
                                 <td>Mobile</td>
                                 <td class="font-weight-bold">$24,983</td>
                                 <td><i class="fa fa-caret-down text-success me-1"></i>.05%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Indo Allinone</td>
                                 <td>81,865</td>
                                 <td>149.18</td>
                                 <td>Fashion</td>
                                 <td class="font-weight-bold">$86,334</td>
                                 <td><i class="fa fa-caret-down text-success me-1"></i>.05%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Spark Limited</td>
                                 <td>32,309</td>
                                 <td>149.18</td>
                                 <td>Gift</td>
                                 <td class="font-weight-bold">$25,000</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Stranger Seller</td>
                                 <td>149.18</td>
                                 <td>25,000</td>
                                 <td>Manufecture</td>
                                 <td class="font-weight-bold">$58.39</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Altanta Products</td>
                                 <td>149.18</td>
                                 <td>10,120</td>
                                 <td>Cloths</td>
                                 <td class="font-weight-bold">$2,167.83</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                              <tr>
                                 <td class="font-weight-bold">Suprtmarket Online</td>
                                 <td>2,142</td>
                                 <td>149.18</td>
                                 <td>Elactrical</td>
                                 <td class="font-weight-bold">$5,196</td>
                                 <td><i class="fa fa-caret-up text-danger me-1"></i>.01%</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--End row-->
      </div>
   </div>
</div>
@endsection