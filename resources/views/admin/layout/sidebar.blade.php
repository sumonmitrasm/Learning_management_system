<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<div class="sticky">
   <aside class="app-sidebar sidebar-scroll">
      <div class="main-sidebar-header active">
         <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('admin/assets/images/brand/logo.png') }}" class="main-logo" alt="logo"></a>
         <a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('admin/assets/images/brand/logo1.png') }}" class="main-logo" alt="logo"></a>
         <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('admin/assets/images/brand/favicon.png') }}" alt="logo"></a>
         <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('admin/assets/images/brand/favicon1.png') }}" alt="logo"></a>
      </div>
      <div class="main-sidemenu">
         <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
               <div class="user-pic">
                  <img alt="user-img" class="avatar avatar-xl brround mb-1" src="{{ asset('admin/admin_images/small/'.Auth::guard('admin')->user()->image) }}">
               </div>
               <div class="user-info text-center">
                  <h5 class=" mb-1 font-weight-bold">{{ Auth::guard('admin')->user()->name }}</h5>
                  <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::guard('admin')->user()->type }}</span>
               </div>
            </div>
         </div>
         <div class="slide-left disabled" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
               <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
            </svg>
         </div>
         <ul class="side-menu">
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg>
                  <span class="side-menu__label">Dashboard</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1"><a href="javascript:void(0)">Dashboard</a></li>
                  <li><a class="slide-item" href="index.html"><span>Dashboard 01</span></a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                     <polyline points="2 17 12 22 22 17"></polyline>
                     <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  <span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  @if(Auth::guard('admin')->user()->type=="vendor")
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Vendor Details</a>
                  </li>
                  <li class="sub-slide">
                     <ul class="">
                        <li><a class="sub-slide-item" href="{{url('admin/update-vendor-details/personal')}}">Personal Details</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/update-vendor-details/business')}}">Business details</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/update-vendor-details/bank')}}">Bank details</a></li>
                     </ul>
                  </li>
                  @else
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Settings</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Settings</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-password')}}">Update admin password</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-details')}}">Update admin details</a></li>
                     </ul>
                  </li>

                  <!--------------------------------Admin/subadmin/vendor management -------------------------->
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Settings</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Admin Management</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{url('admin/admins/admin')}}">Admins</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins/subadmin')}}">Subadmins</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins/vendor')}}">Vendors</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins')}}">All</a></li>
                     </ul>
                  </li>
                   <!----------------------------------User management ----------------------------------------->

                   <li class="side-menu-label1">
                     <a href="javascript:void(0)">Settings</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">User Management</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{url('admin/admins/admin')}}">Users</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins/subadmins')}}">Subscribers</a></li>
                     </ul>
                  </li>
                  @endif
               </ul>
            </li>

            
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                     <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                     <line x1="12" y1="22.08" x2="12" y2="12"></line>
                  </svg>
                  <span class="side-menu__label">Page Management</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Widgets</a>
                  </li>
                  <li><a href="{{url('admin/section')}}" class="slide-item">Section</a></li>
                  <li><a href="{{url('admin/category')}}" class="slide-item">Category</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                     <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                  </svg>
                  <span class="side-menu__label">Forms</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Forms</a>
                  </li>
                  <li><a href="{{route('course.views')}}" class="slide-item">Course</a></li>
                  <li><a href="{{route('filter.views')}}" class="slide-item"> Filter</a></li>
                  <li><a href="{{route('slider.views')}}" class="slide-item"> Sliders</a></li>
                  <li><a href="{{route('brand.views')}}" class="slide-item"> Brands</a></li>
                  <li><a href="form-sizes.html" class="slide-item"> Form Element Sizes</a></li>
                  <li><a href="form-treeview.html" class="slide-item"> Form Treeview</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                     <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                  </svg>
                  <span class="side-menu__label">Charts</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Charts</a>
                  </li>
                  <li><a href="chart-chartist.html" class="slide-item">Chartjs Charts</a></li>
                  <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                  <li><a href="chart-apex.html" class="slide-item"> Apex Charts</a></li>
                  <li><a href="chart-peity.html" class="slide-item"> Pie Charts</a></li>
                  <li><a href="chart-echart.html" class="slide-item"> Echart Charts</a></li>
                  <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                  <li><a href="chart-c3.html" class="slide-item">C3 Charts</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                     <line x1="3" y1="9" x2="21" y2="9"></line>
                     <line x1="9" y1="21" x2="9" y2="9"></line>
                  </svg>
                  <span class="side-menu__label">Tables</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Tables</a>
                  </li>
                  <li><a href="tables.html" class="slide-item">Default table</a></li>
                  <li><a href="datatable.html" class="slide-item">Data Table</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <rect x="3" y="3" width="7" height="7"></rect>
                     <rect x="14" y="3" width="7" height="7"></rect>
                     <rect x="14" y="14" width="7" height="7"></rect>
                     <rect x="3" y="14" width="7" height="7"></rect>
                  </svg>
                  <span class="side-menu__label">Elements</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Elements</a>
                  </li>
                  <li><a href="accordion.html" class="slide-item"> Accordion</a></li>
                  <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                  <li><a href="avatars.html" class="slide-item"> Avatars</a></li>
                  <li><a href="badge.html" class="slide-item"> Badges</a></li>
                  <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumb</a></li>
                  <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                  <li><a href="cards.html" class="slide-item"> Cards</a></li>
                  <li><a href="cards-image.html" class="slide-item"> Card Images</a></li>
                  <li><a href="carousel.html" class="slide-item"> Carousel</a></li>
                  <li><a href="dropdown.html" class="slide-item"> Dropdown</a></li>
                  <li><a href="footers.html" class="slide-item"> Footers</a></li>
                  <li><a href="headers.html" class="slide-item"> Headers</a></li>
                  <li><a href="list.html" class="slide-item"> List</a></li>
                  <li><a href="media-object.html" class="slide-item"> Media Object</a></li>
                  <li><a href="modal.html" class="slide-item"> Modal</a></li>
                  <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                  <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                  <li><a href="panels.html" class="slide-item"> Panel</a></li>
                  <li><a href="popover.html" class="slide-item"> Popover</a></li>
                  <li><a href="progress.html" class="slide-item"> Progress</a></li>
                  <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                  <li><a href="tags.html" class="slide-item"> Tags</a></li>
                  <li><a href="tooltip.html" class="slide-item"> Tooltips</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                  </svg>
                  <span class="side-menu__label">Icons</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Icons</a>
                  </li>
                  <li><a href="icons.html" class="slide-item"> Font Awesome</a></li>
                  <li><a href="icons2.html" class="slide-item"> Material Design Icons</a></li>
                  <li><a href="icons3.html" class="slide-item"> Simple Line Icons</a></li>
                  <li><a href="icons4.html" class="slide-item"> Feather Icons</a></li>
                  <li><a href="icons5.html" class="slide-item"> Ionic Icons</a></li>
                  <li><a href="icons6.html" class="slide-item"> Flag Icons</a></li>
                  <li><a href="icons7.html" class="slide-item"> pe7 Icons</a></li>
                  <li><a href="icons8.html" class="slide-item"> Themify Icons</a></li>
                  <li><a href="icons9.html" class="slide-item">Typicons Icons</a></li>
                  <li><a href="icons10.html" class="slide-item">Weather Icons</a></li>
                  <li><a href="icons11.html" class="slide-item">Material Icons</a></li>
                  <li><a href="icons12.html" class="slide-item">Bootstrap5 SVG Icons</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                     <polyline points="13 2 13 9 20 9"></polyline>
                  </svg>
                  <span class="side-menu__label">Pages</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Pages</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Profile</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="profile-1.html">Profile 01</a></li>
                        <li><a class="sub-slide-item" href="profile-2.html">Profile 02</a></li>
                        <li><a class="sub-slide-item" href="profile-3.html">Profile 03</a></li>
                     </ul>
                  </li>
                  <li><a href="about.html" class="slide-item"> About Us</a></li>
                  <li><a href="editprofile.html" class="slide-item"> Edit Profile</a></li>
                  <li><a href="settings.html" class="slide-item"> Settings</a></li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Email</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="email-compose.html">Email Compose</a></li>
                        <li><a class="sub-slide-item" href="email-inbox.html">Email Inbox</a></li>
                        <li><a class="sub-slide-item" href="email-read.html">Email Read</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Pricing</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="pricing.html">Pricing 01</a></li>
                        <li><a class="sub-slide-item" href="pricing-2.html">Pricing 02</a></li>
                        <li><a class="sub-slide-item" href="pricing-3.html">Pricing 03</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Invoice</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="invoice-list.html">Invoice list</a></li>
                        <li><a class="sub-slide-item" href="invoice-1.html">Invoice 01</a></li>
                        <li><a class="sub-slide-item" href="invoice-2.html">Invoice 02</a></li>
                        <li><a class="sub-slide-item" href="invoice-3.html">Invoice 03</a></li>
                        <li><a class="sub-slide-item" href="invoice-add.html">Add Invoice</a></li>
                        <li><a class="sub-slide-item" href="invoice-edit.html">Edit Invoice</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Blog</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="blog.html">Blog 01</a></li>
                        <li><a class="sub-slide-item" href="blog-2.html">Blog 02</a></li>
                        <li><a class="sub-slide-item" href="blog-3.html">Blog 03</a></li>
                        <li><a class="sub-slide-item" href="blog-styles.html">Blog Styles</a></li>
                        <li><a class="sub-slide-item" href="blog-post.html">Blog Post</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">E-commerce</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="shop.html">Products</a></li>
                        <li><a class="sub-slide-item" href="shop-des.html">Product Details</a></li>
                        <li><a class="sub-slide-item" href="cart.html">Shopping Cart</a></li>
                        <li><a class="sub-slide-item" href="checkout.html">Checkout</a></li>
                        <li><a class="sub-slide-item" href="wishlist.html">Wishlist</a></li>
                     </ul>
                  </li>
                  <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                  <li><a href="faq.html" class="slide-item"> FAQS</a></li>
                  <li><a href="terms.html" class="slide-item"> Terms</a></li>
                  <li><a href="empty.html" class="slide-item"> Empty Page</a></li>
                  <li><a href="switcher.html" class="slide-item"> Switcher</a></li>
                  <li><a href="search.html" class="slide-item"> Search</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <line x1="4" y1="21" x2="4" y2="14"></line>
                     <line x1="4" y1="10" x2="4" y2="3"></line>
                     <line x1="12" y1="21" x2="12" y2="12"></line>
                     <line x1="12" y1="8" x2="12" y2="3"></line>
                     <line x1="20" y1="21" x2="20" y2="16"></line>
                     <line x1="20" y1="12" x2="20" y2="3"></line>
                     <line x1="1" y1="14" x2="7" y2="14"></line>
                     <line x1="9" y1="8" x2="15" y2="8"></line>
                     <line x1="17" y1="16" x2="23" y2="16"></line>
                  </svg>
                  <span class="side-menu__label">Submenus</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1"><a href="javascript:void(0)"></a>Submenus</li>
                  <li><a href="javascript:void(0)" class="slide-item">Level-1</a></li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Level-2</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">Level-2.1</a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">Level-2.2</a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">Level-2.3</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                     <circle cx="9" cy="7" r="4"></circle>
                     <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <span class="side-menu__label">Account</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Account</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Login</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="login-1.html">Login 01</a></li>
                        <li><a class="sub-slide-item" href="login-2.html">Login 02</a></li>
                        <li><a class="sub-slide-item" href="login-3.html">Login 03</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Register</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="register-1.html">Register 01</a></li>
                        <li><a class="sub-slide-item" href="register-2.html">Register 02</a></li>
                        <li><a class="sub-slide-item" href="register-3.html">Register 03</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Forget Password</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="forgot-password-1.html">Forgot Password 01</a></li>
                        <li><a class="sub-slide-item" href="forgot-password-2.html">Forgot Password 02</a></li>
                        <li><a class="sub-slide-item" href="forgot-password-3.html">Forgot Password 03</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Reset Password</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="reset-password-1.html">Reset Password 01</a></li>
                        <li><a class="sub-slide-item" href="reset-password-2.html">Reset Password 02</a></li>
                        <li><a class="sub-slide-item" href="reset-password-3.html">Reset Password 03</a></li>
                     </ul>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Lock Screen</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="lockscreen-1.html">Lock Screen 01</a></li>
                        <li><a class="sub-slide-item" href="lockscreen-2.html">Lock Screen 02</a></li>
                        <li><a class="sub-slide-item" href="lockscreen-3.html">Lock Screen 03</a></li>
                     </ul>
                  </li>
                  <li><a href="construction.html" class="slide-item"> Under Construction</a></li>
                  <li><a href="coming.html" class="slide-item"> Coming Soon</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <circle cx="12" cy="12" r="10"></circle>
                     <line x1="12" y1="8" x2="12" y2="12"></line>
                     <line x1="12" y1="16" x2="12.01" y2="16"></line>
                  </svg>
                  <span class="side-menu__label">Error Pages</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Error Pages</a>
                  </li>
                  <li><a href="400.html" class="slide-item"> 400</a></li>
                  <li><a href="401.html" class="slide-item"> 401</a></li>
                  <li><a href="403.html" class="slide-item"> 403</a></li>
                  <li><a href="404.html" class="slide-item"> 404</a></li>
                  <li><a href="500.html" class="slide-item"> 500</a></li>
                  <li><a href="503.html" class="slide-item"> 503</a></li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                     <rect x="9" y="9" width="6" height="6"></rect>
                     <line x1="9" y1="1" x2="9" y2="4"></line>
                     <line x1="15" y1="1" x2="15" y2="4"></line>
                     <line x1="9" y1="20" x2="9" y2="23"></line>
                     <line x1="15" y1="20" x2="15" y2="23"></line>
                     <line x1="20" y1="9" x2="23" y2="9"></line>
                     <line x1="20" y1="14" x2="23" y2="14"></line>
                     <line x1="1" y1="9" x2="4" y2="9"></line>
                     <line x1="1" y1="14" x2="4" y2="14"></line>
                  </svg>
                  <span class="side-menu__label">Utilities</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Utilities</a>
                  </li>
                  <li><a href="element-colors.html" class="slide-item"> Colors</a></li>
                  <li><a href="element-flex.html" class="slide-item"> Flex Items</a></li>
                  <li><a href="element-height.html" class="slide-item"> Height</a></li>
                  <li><a href="elements-border.html" class="slide-item"> Border</a></li>
                  <li><a href="elements-display.html" class="slide-item"> Display</a></li>
                  <li><a href="elements-margin.html" class="slide-item"> Margin</a></li>
                  <li><a href="elements-paddning.html" class="slide-item"> Padding</a></li>
                  <li><a href="element-typography.html" class="slide-item"> Typography</a></li>
                  <li><a href="element-width.html" class="slide-item"> Width</a></li>
               </ul>
            </li>
         </ul>
         <div class="app-sidebar-help">
            <div class="dropdown text-center">
               <div class="help d-flex">
                  <a href="javascript:void(0)" class="nav-link p-0 help-dropdown" data-bs-toggle="dropdown">
                  <span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ms-2"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-4">
                     <div class="sidebar-dropdown-divider pb-3">
                        <h4 class="font-weight-bold">Help</h4>
                        <a class="d-block" href="javascript:void(0)">Knowledge base</a>
                        <a class="d-block" href="javascript:void(0)">Contact@info.com</a>
                        <a class="d-block" href="javascript:void(0)">88 8888 8888</a>
                     </div>
                     <div class="sidebar-dropdown-divider pb-3 pt-3 mb-3">
                        <p class="mb-1">Your Fax Number</p>
                        <a class="font-weight-bold" href="javascript:void(0)">88 8888 8888</a>
                     </div>
                     <a href="login-1.html">Logout</a>
                  </div>
                  <div class="ms-auto">
                     <a class="nav-link icon p-0" href="javascript:void(0)">
                        <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                           <path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path>
                           <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path>
                        </svg>
                        <span class="pulse "></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="slide-right" id="slide-right">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
               <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
            </svg>
         </div>
      </div>
   </aside>
</div>