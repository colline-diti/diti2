<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="{{ route('cafeDashboard') }}">
                        <span>DIT-Business Center</span></a></div>
                        <li><a href="{{ route('cafeDashboard') }}" ><i class="ti-home"></i> Home</a>                   
                </li>

                <li class="label">Features</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Sales Point <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('reciepts.index') }}"><i class="ti-tag"></i> Make Sales</a></li>                        
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-shopping-cart"></i> Stock Management<span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('item-categories.index') }}"><i class="ti-tag"></i>Add Item Category</a></li> 
                        <li><a href="{{ route('res-sections.index') }}"> <i class="ti-tag"></i> Stock Sections</a></li>
                        <li><a href="{{ route('units.index') }}"> <i class="ti-tag"></i> Add Item Units</a></li>  
                        <li><a href="{{ route('stock-tables.index') }}" ><i class="ti-tag"></i> Add new stock</a></li>
                        <li><a href="{{ route('stock-discharges.index') }}"><i class="ti-tag"></i> Discharge Stock</a></li>                        
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bookmark-alt"></i> Product Management <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>                        
                        <li><a href="{{ route('res-products.index') }}"> <i class="ti-tag"></i> Add Product</a></li> 
                        <li><a href="{{ route('res-categories.index') }}"> <i class="ti-tag"></i> Add Product Category</a></li>   
                    </ul>
                </li> 
                <li><a class="sidebar-sub-toggle"><i class="ti-truck"></i> Business Procurement <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>                        
                        <li><a href="{{ route('restaurant-requisitions.index') }}"> <i class="ti-tag"></i> Requisition</a></li> 
                        <li><a href=""> <i class="ti-tag"></i> Invoices</a></li> 
                        <li><a href="{{ route('all-tax-rates.index') }}"> <i class="ti-tag"></i> Tax Rates</a></li> 
                        <li><a href="{{ route('requisition-items.index') }}"> <i class="ti-tag"></i> Add Requisition Item</a></li>  
                        <li><a href="{{ route('all-payment-types.index') }}"> <i class="ti-tag"></i> Payment Types</a></li>   
                    </ul>
                </li> 
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Reports <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>                        
                        <li><a href="{{ route('res-products.dailyLogs') }}"> <i class="ti-tag"></i> Daily Sales Log</a></li>                        
                        <li><a href="{{ route('stock-discharges.stockLevels') }}"> <i class="ti-tag"></i> Stock Levels</a></li> 
                                                                 
                    </ul>
                </li>    
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->