@include('header')
@php
$defaultStartDate = request('start_date') 
        ?? \Carbon\Carbon::now()->subMonths(3)->format('Y-m-d');

$defaultEndDate = request('end_date') 
        ?? \Carbon\Carbon::now()->format('Y-m-d');
function getWalletMessage($resource = null) {
    $r = strtolower(trim($resource ?? ''));

    if (str_contains($r, 'admin_added')) {
        return 'Amount added by admin';
    }

    if (str_contains($r, 'admin_removed')) {
        return 'Amount deducted by admin';
    }

    if (str_contains($r, 'order_placed_wallet')) {
        return 'Wallet amount used for order';
    }

    if (str_contains($r, 'order_wallet_deduction')) {
        return 'Wallet amount deducted for order';
    }

    if (str_contains($r, 'order_refund_cancelled')) {
        return 'Order cancelled, refund added to wallet';
    }

    if (str_contains($r, 'cash_back')) {
        return 'Cashback credited to wallet';
    }

    if (str_contains($r, 'referral')) {
        if (str_contains($r, 'registration')) {
            return 'Referral bonus after registration';
        }
        if (str_contains($r, 'first_order')) {
            return 'Referral bonus after first order completion';
        }
        if (str_contains($r, 'return')) {
            return 'Referral bonus returned to wallet';
        }
        return 'Referral bonus credited';
    }

    if (str_contains($r, 'add')) {
        return 'Wallet amount added';
    }

    if (str_contains($r, 'deduct') || str_contains($r, 'remove')) {
        return 'Wallet amount deducted';
    }

    if (str_contains($r, 'expire')) {
        return 'Wallet balance expired';
    }

    return 'Wallet transaction';
}
@endphp
<section class="account-page py-5">
    <div class="container-fluid">
        <div class="sidemenu_mainBox">
            <div class="sidemenu_menu_mainBox">
                <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
                    <nav class="menu open-current-submenu">
                        <div id="side-menu">
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}profile" class="sub-menu-list-link">Profile</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}my-orders?tab=1" class="sub-menu-list-link">My Order</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}address-list" class="sub-menu-list-link">My Address</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}coupon" class="sub-menu-list-link">My Offers</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}notification" class="sub-menu-list-link">Notification</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">Payment Details</div>
                                <div class="collapse" id="account" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wallet" class="sub-inner-links">Wallet</a></li>
                                        <li><a href="{{ENV('APP_URL')}}card-details" class="sub-inner-links">Card Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#shopping" aria-expanded="false" aria-controls="shopping">My Shopping</div>
                                <div class="collapse" id="shopping" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wishlist" class="sub-inner-links">Wishlist</a></li>
                                        <li><a href="{{ENV('APP_URL')}}notify" class="sub-inner-links">Notify Me</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}help" class="sub-menu-list-link">Get Help</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}faq" class="sub-menu-list-link">FAQ's</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="javascript(0)" data-bs-toggle="modal" data-bs-target="#logout" class="sub-menu-list-link">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="sidemenu_content_mainBox">
                <div class="widget">
                    <div class="section-header">
                        <h5 class="heading-design-h5">
                            My Wallet
                        </h5>
                    </div>
                    @if(isset($appInfo['data']) && count($appInfo['data']) > 0)

                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="wallet_box">
                                    <div class="amountBox">AED
                                        <span>{{number_format($appInfo['data']['userwallet'], 2)}}</span>
                                    </div>
                                    <div class="wallet_text">Your Available Balance</div>
                                    <p>Wallet amount will be deducted as per delivery schedule.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="card mt-3">
                        <div class="card-header1 card-header-info1">
                            <h4 class="card-title" style=" margin-left:10px; margin-top:10px;">Recent activity</h4>
                        
                            <form method="GET" action="{{ url()->current() }}">
                        
                                <!-- Row 1: Filters -->
                                <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:10px; margin-left:10px; margin-right:10px;">
                        
                                    <!-- Type Filter -->
                                    <div style="min-width:100px;">
                                        <label>Type</label>
                                        <select name="type" class="form-control">
                                            <option value="all">All</option>
                                            <option value="added" {{ request('type') == 'added' ? 'selected' : '' }}>Added</option>
                                            <option value="deducted" {{ request('type') == 'deducted' ? 'selected' : '' }}>Deducted</option>
                                        </select>
                                    </div>
                        
                                    <!-- Start Date -->
                                    <div style=" min-width:100px;">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ $defaultStartDate }}">
                                    </div>
                        
                                    <!-- End Date -->
                                    <div style="min-width:100px;">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ $defaultEndDate  }}">
                                    </div>
                                    <div style="margin-top:28px;">
                                        <button type="submit" class="btn btn-primary"style="min-width:100px; height:40px;">
                                            Filter
                                        </button>
                                    </div>
                                    <div style="margin-top:28px;">
                                        <a href="{{ url()->current() }}" class="btn btn-secondary"style="min-width:100px; height:40px;">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                        <div class="card-body">
                        @if(isset($walletHIstoryList['data']) && count($walletHIstoryList['data']) > 0)
                            @foreach($walletHIstoryList['data'] as $yearData)
                                <h5 style="margin-top:20px;">Year: {{ $yearData['year'] }}</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Order ID/Product Order ID</th>
                                            <th>Amount</th>
                                            <th>Expiry Date</th>
                                            <th>Added Via</th>
                                            <th>Added Date</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @php $i = 1; @endphp
                    
                                        @foreach($yearData['items'] as $item)
                    
                                            @php
                                                $type = strtolower($item['type'] ?? '');
                                            @endphp
                    
                                            <tr>
                                                <td>{{ $i++ }}</td>
                    
                                                <td>{{ ucfirst($item['type'] ?? '-') }}</td>
                                                <td>{{ !empty($item['group_id']) ? $item['group_id'] : '' }}{{ !empty($item['cart_id']) ? ' (' . $item['cart_id'] . ')' : '' }}</td>
                    
                                                <td>
                                                    @if($type === 'add')
                                                        <span style="color:#4b861a; font-weight:700;">
                                                            + AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                        </span>
                    
                                                    @elseif($type === 'deduction')
                                                        <span style="color:#dc1326; font-weight:700;">
                                                            - AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                        </span>
                    
                                                    @elseif($type === 'wallet_expired')
                                                        <span style="color:#6c757d; font-weight:700;">
                                                            AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                        </span>
                    
                                                    @else
                                                        AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                    @endif
                                                </td>
                                                <td>{{ !empty($item['expiry_date']) 
                                                        ? \Carbon\Carbon::parse($item['expiry_date'])->format('d M') 
                                                        : '-' 
                                                    }}</td>
                                                <td>{{ getWalletMessage($item['resource'] ?? '') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M') }}</td>
                                            </tr>
                    
                                        @endforeach
                    
                                    </tbody>
                                </table>
                    
                            @endforeach
                    
                        @else
                            <div class="text-center">
                                <p>No wallet history found</p>
                            </div>
                        @endif
                    
                    </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>
@include('footer')