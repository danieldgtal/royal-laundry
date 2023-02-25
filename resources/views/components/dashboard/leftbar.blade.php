<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                @if (auth()->check() && auth()->user()->user_type === '0')
                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="calendar.html">
                            <i class="mdi mdi-calendar-month"></i>
                            <span> Notification </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-google-pages"></i>
                            <span> Schedule </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="pages-timeline.html">Drop Off</a></li>
                            <li><a href="pages-invoice.html">Pick Up</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Track Laundry Status</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-content-copy"></i>
                            <span> Select Services </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="pages-timeline.html">Timeline</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-gallery.html">Gallery</a></li>
                            <li><a href="pages-maintenance.html">Maintenance</a></li>
                            <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Transaction History </span>
                        </a>
                    </li>

                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Payments </span>
                        </a>
                    </li>
                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Feedback </span>
                        </a>
                    </li>

                    <li>
                        <a href="calendar.html">
                            <i class="mdi mdi-calendar-month"></i>
                            <span> Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="index-2.html">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->user_type === '1')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-format-underline"></i>
                            <span> Dashboard </span>

                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-format-underline"></i>
                            <span> Invoicing </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                            <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                            <li><a href="ui-navs.html">Navs</a></li>
                            <li><a href="ui-progress.html">Progress</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-notification.html">Notification</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-package-variant-closed"></i>
                            <span> Manage Inventory </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="components-grid.html">Grid</a></li>
                            <li><a href="components-range-sliders.html">Range sliders</a></li>
                            <li><a href="components-sweet-alert.html">Sweet Alerts</a></li>
                            <li><a href="components-ratings.html">Ratings</a></li>
                            <li><a href="components-treeview.html">Treeview</a></li>
                            <li><a href="components-tour.html">Tour</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-puzzle-outline"></i>
                            <span> Manage Customers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="widgets-tiles.html">Tile Box</a></li>
                            <li><a href="widgets-charts.html">Chart Widgets</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-black-mesa"></i>
                            <span> Orders </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="icons-materialdesign.html">Material Design</a></li>
                            <li><a href="icons-ionicons.html">Ion Icons</a></li>
                            <li><a href="icons-fontawesome.html">Font awesome</a></li>
                            <li><a href="icons-themify.html">Themify Icons</a></li>
                            <li><a href="icons-simple-line.html">Simple line Icons</a></li>
                            <li><a href="icons-weather.html">Weather Icons</a></li>
                            <li><a href="icons-pe7.html">PE7 Icons</a></li>
                            <li><a href="icons-typicons.html">Typicons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-file-document-box-check-outline"></i>
                            <span class="badge badge-warning badge-pill float-right">8</span>
                            <span> Reports </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="form-elements.html">General Elements</a></li>
                            <li><a href="form-advanced.html">Advanced Form</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-pickers.html">Form Pickers</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-mask.html">Form Masks</a></li>
                            <li><a href="form-uploads.html">Multiple File Upload</a></li>
                            <li><a href="form-xeditable.html">X-editable</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-table-settings"></i>
                            <span> Weight Bill </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tables-basic.html">Basic Tables</a></li>
                            <li><a href="tables-datatable.html">Data Tables</a></li>
                            <li><a href="tables-responsive.html">Responsive Table</a></li>
                            <li><a href="tables-tablesaw.html">Tablesaw</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-poll"></i>
                            <span> Profile </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="charts-flot.html">Flot Charts</a></li>
                            <li><a href="charts-morris.html">Morris Charts</a></li>
                            <li><a href="charts-chartjs.html">Chartjs</a></li>
                            <li><a href="charts-peity.html">Peity Charts</a></li>
                            <li><a href="charts-chartist.html">Chartist Charts</a></li>
                            <li><a href="charts-c3.html">C3 Charts</a></li>
                            <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                            <li><a href="charts-knob.html">Jquery Knob</a></li>
                        </ul>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->user_type === '2')
                    <li class="menu-title mt-2">More</li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-share-variant"></i>
                            <span> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="javascript: void(0);">Level 1.1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>