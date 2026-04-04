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
<style>
/* /wallet — mobile-friendly layout */
.wallet-page.account-page { overflow-x: hidden; }
.wallet-page .wallet-balance-col { max-width: 100%; }
@media (max-width: 767.98px) {
    .wallet-page.account-page { padding-top: 1rem !important; padding-bottom: 1.5rem !important; }
    .wallet-page .container-fluid { padding-left: 12px; padding-right: 12px; }
    .wallet-page .wallet_box { margin-left: 0; margin-right: 0; }
    .wallet-page .amountBox span { font-size: clamp(1.35rem, 6vw, 1.85rem); font-weight: 700; }
    .wallet-page .section-header { padding-left: 2px; padding-right: 2px; }
    .wallet-page .wallet-filters .wallet-filter-actions { margin-top: 0 !important; }
    .wallet-page .wallet-filters .wallet-filter-actions .btn { width: 100%; }
    .wallet-page .card-header1 .card-title { margin-left: 0 !important; margin-top: 0.5rem !important; font-size: 1.1rem; }
    .wallet-page .wallet-year-heading { font-size: 1rem; margin-top: 1rem !important; }
    /* Mobile: collapsible row — summary shows Order ID + Amount only */
    .wallet-page .wallet-acc {
        border: 1px solid #dee2e6;
        border-radius: 12px;
        margin-bottom: 10px;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,.06);
        overflow: hidden;
    }
    .wallet-page .wallet-acc__summary {
        padding: 14px 14px 14px 14px;
        cursor: pointer;
        list-style: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    }
    .wallet-page .wallet-acc__summary::-webkit-details-marker { display: none; }
    .wallet-page .wallet-acc__summary-inner {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    .wallet-page .wallet-acc__summary-text {
        flex: 1;
        min-width: 0;
    }
    .wallet-page .wallet-acc__order {
        font-weight: 600;
        font-size: 13px;
        color: #222;
        word-break: break-word;
        line-height: 1.4;
    }
    .wallet-page .wallet-acc__amount {
        margin-top: 8px;
        font-size: 15px;
        line-height: 1.3;
        font-weight: 700;
    }
    .wallet-page .wallet-acc__chev {
        flex-shrink: 0;
        width: 8px;
        height: 8px;
        margin-top: 6px;
        border-right: 2px solid #2e317e;
        border-bottom: 2px solid #2e317e;
        transform: rotate(45deg);
        transition: transform 0.2s ease;
        pointer-events: none;
    }
    .wallet-page .wallet-acc[open] .wallet-acc__chev {
        transform: rotate(-135deg);
        margin-top: 10px;
    }
    .wallet-page .wallet-acc__panel {
        padding: 4px 14px 14px;
        border-top: 1px solid #eee;
        font-size: 13px;
    }
    .wallet-page .wallet-acc__row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .wallet-page .wallet-acc__row:last-child { border-bottom: none; }
    .wallet-page .wallet-acc__label {
        font-weight: 600;
        color: #2e317e;
        flex: 0 0 42%;
        max-width: 46%;
    }
    .wallet-page .wallet-acc__value {
        text-align: right;
        word-break: break-word;
        flex: 1;
        color: #333;
    }
}
@media (min-width: 768px) {
    .wallet-page .table-responsive-wallet { overflow-x: auto; -webkit-overflow-scrolling: touch; }
    .wallet-page table.wallet-table-desktop { min-width: 720px; }
}
</style>
<section class="account-page py-5 wallet-page">
    <div class="container-fluid px-2 px-md-3">
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

                        <div class="row g-2">
                            <div class="col-12 col-lg-6 wallet-balance-col">
                                <div class="wallet_box">
                                    <div class="amountBox">AED
                                        <span>{{ number_format((float) ($appInfo['data']['userwallet'] ?? 0), 2) }}</span>
                                    </div>
                                    <div class="wallet_text">Your Available Balance</div>
                                    <p>Wallet amount will be deducted as per delivery schedule.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="card mt-3 border-0 shadow-sm">
                        <div class="card-header1 card-header-info1 px-2 px-md-3">
                            <h4 class="card-title px-1 px-md-2 mb-2 mb-md-0" style="margin-left:0; margin-top:10px;">Recent activity</h4>
                        
                            <form method="GET" action="{{ url()->current() }}" class="wallet-filters">
                                <div class="row g-2 gx-2 gy-2 align-items-end mb-3 mx-0">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <label class="form-label small mb-1" for="wallet-filter-type">Type</label>
                                        <select name="type" id="wallet-filter-type" class="form-select">
                                            <option value="all">All</option>
                                            <option value="added" {{ request('type') == 'added' ? 'selected' : '' }}>Added</option>
                                            <option value="deducted" {{ request('type') == 'deducted' ? 'selected' : '' }}>Deducted</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <label class="form-label small mb-1" for="wallet-start-date">Start date</label>
                                        <input type="date" id="wallet-start-date" name="start_date" class="form-control" value="{{ $defaultStartDate }}">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <label class="form-label small mb-1" for="wallet-end-date">End date</label>
                                        <input type="date" id="wallet-end-date" name="end_date" class="form-control" value="{{ $defaultEndDate }}">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-3 wallet-filter-actions d-flex flex-column flex-sm-row gap-2 gap-sm-2 pt-sm-0 pt-1">
                                        <button type="submit" class="btn btn-primary flex-grow-1" style="min-height:40px;">Filter</button>
                                        <a href="{{ url()->current() }}" class="btn btn-secondary flex-grow-1 text-center align-self-stretch d-flex align-items-center justify-content-center" style="min-height:40px;">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                        <div class="card-body px-2 px-md-3">
                        @if(isset($walletHIstoryList['data']) && count($walletHIstoryList['data']) > 0)
                            @foreach($walletHIstoryList['data'] as $yearData)
                                <h5 class="wallet-year-heading" style="margin-top:20px;">Year: {{ $yearData['year'] }}</h5>

                                {{-- Mobile: tap row to expand (summary = Order ID + Amount only) --}}
                                <div class="d-md-none wallet-acc-list">
                                    @foreach($yearData['items'] as $item)
                                        @php
                                            $type = strtolower($item['type'] ?? '');
                                            $orderRef = trim((!empty($item['group_id']) ? $item['group_id'] : '') . (!empty($item['cart_id']) ? ' (' . $item['cart_id'] . ')' : ''));
                                        @endphp
                                        <details class="wallet-acc">
                                            <summary class="wallet-acc__summary">
                                                <div class="wallet-acc__summary-inner">
                                                    <div class="wallet-acc__summary-text">
                                                        <div class="wallet-acc__order">{{ $orderRef !== '' ? $orderRef : '—' }}</div>
                                                        <div class="wallet-acc__amount">
                                                            @if($type === 'add')
                                                                <span style="color:#4b861a;">+ AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                            @elseif($type === 'deduction')
                                                                <span style="color:#dc1326;">- AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                            @elseif($type === 'wallet_expired')
                                                                <span style="color:#6c757d;">AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                            @else
                                                                AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <span class="wallet-acc__chev" aria-hidden="true"></span>
                                                </div>
                                            </summary>
                                            <div class="wallet-acc__panel">
                                                <div class="wallet-acc__row">
                                                    <span class="wallet-acc__label">#</span>
                                                    <span class="wallet-acc__value">{{ $loop->iteration }}</span>
                                                </div>
                                                <div class="wallet-acc__row">
                                                    <span class="wallet-acc__label">Type</span>
                                                    <span class="wallet-acc__value">{{ ucfirst($item['type'] ?? '—') }}</span>
                                                </div>
                                                <div class="wallet-acc__row">
                                                    <span class="wallet-acc__label">Expiry</span>
                                                    <span class="wallet-acc__value">{{ !empty($item['expiry_date'])
                                                            ? \Carbon\Carbon::parse($item['expiry_date'])->format('d M Y')
                                                            : '—'
                                                        }}</span>
                                                </div>
                                                <div class="wallet-acc__row">
                                                    <span class="wallet-acc__label">Via</span>
                                                    <span class="wallet-acc__value">{{ getWalletMessage($item['resource'] ?? '') }}</span>
                                                </div>
                                                <div class="wallet-acc__row">
                                                    <span class="wallet-acc__label">Date</span>
                                                    <span class="wallet-acc__value">{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </details>
                                    @endforeach
                                </div>

                                {{-- Tablet/desktop: full table --}}
                                <div class="table-responsive-wallet d-none d-md-block">
                                    <table class="table table-striped wallet-table-desktop mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Order ID</th>
                                                <th>Amount</th>
                                                <th>Expiry</th>
                                                <th>Via</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($yearData['items'] as $item)
                                                @php
                                                    $type = strtolower($item['type'] ?? '');
                                                    $orderRef = trim((!empty($item['group_id']) ? $item['group_id'] : '') . (!empty($item['cart_id']) ? ' (' . $item['cart_id'] . ')' : ''));
                                                @endphp
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ ucfirst($item['type'] ?? '-') }}</td>
                                                    <td>{{ $orderRef !== '' ? $orderRef : '—' }}</td>
                                                    <td>
                                                        @if($type === 'add')
                                                            <span style="color:#4b861a; font-weight:700;">+ AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                        @elseif($type === 'deduction')
                                                            <span style="color:#dc1326; font-weight:700;">- AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                        @elseif($type === 'wallet_expired')
                                                            <span style="color:#6c757d; font-weight:700;">AED {{ number_format((float)($item['amount'] ?? 0), 2) }}</span>
                                                        @else
                                                            AED {{ number_format((float)($item['amount'] ?? 0), 2) }}
                                                        @endif
                                                    </td>
                                                    <td>{{ !empty($item['expiry_date'])
                                                            ? \Carbon\Carbon::parse($item['expiry_date'])->format('d M')
                                                            : '—'
                                                        }}</td>
                                                    <td>{{ getWalletMessage($item['resource'] ?? '') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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