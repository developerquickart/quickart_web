<?php
use Carbon\Carbon;


//Set Total cashback in cart page...G1 (time-slot cashback banners disabled)
function calculateTotalCashback($rootJson)
{
    return "";
}

// Check time slot msg...G1 (time-slot cashback banners disabled)
if (!function_exists('checkSelectedTimeslotCashback')) {
    function checkSelectedTimeslotCashback($data)
    {
        return "";
    }
}


// Set order status...G1
if (!function_exists('getOrderStatus')) {
    function getOrderStatus($orderStatus)
    {
        if ($orderStatus == "Completed") {
            return "Completed";
        } elseif ($orderStatus == "Confirmed") {
            return "Processed";
        } elseif (in_array($orderStatus, ["pending", "Pending", "In Progress"])) {
            return "Placed"; 
        } elseif ($orderStatus == "Inprogress") {
            return "In Progress";
        } elseif ($orderStatus == "Cancelled") {
            return "Cancelled";
        } elseif ($orderStatus == "Out_For_Delivery") {
            return "Out For Delivery";
        } elseif ($orderStatus == "Ready For Pick Up") {
            return "Ready For Pick Up";
        }  elseif ($orderStatus == "Processing_payment") {
            return "Processing Payment";
        }  elseif ($orderStatus == "Payment_failed") {
            return "Payment Failed";
        } else {
            return $orderStatus;
        }
    }

}
// set order status color...G1
if (!function_exists('getProdOrderStatusColor')) {
    function getProdOrderStatusColor($prodorderStatus)
    {
        switch (strtolower($prodorderStatus)) {
            case 'completed':
                return '#248c44';
            case 'pause':
                return '#BDA6E1';
            case 'pending':
                return '#e69138';
            case 'processing payment':
                return '#e69138';    
            case 'cancelled':
                return '#DF3F56';
            case 'payment failed':
                return '#DF3F56';    
            case 'out_for_delivery':
                return '#FF7E38';
            case 'ready for pick up':
                return '#FF7E38';
            case 'confirmed':
                return '#FF7E38';
            default:
                return '#ee8b60';
        }
    }
}

//Set notification color...G1
function setNotificationBGColor($title, $isTitle)
{
    // Default color
    $color = '#EBEBFF';

    if (strpos($title, 'Your Order is Placed') !== false) {
        if (strpos($isTitle, 'border') !== false) {
            $color = '#E4D8F5';
        } elseif (strpos($isTitle, 'title') !== false) {
            $color = '#7E65AC';
        } else {
            $color = '#F6F2FC';
        }
    } elseif (strpos($title, 'Your Order has been Delivered') !== false) {
        if (strpos($isTitle, 'border') !== false) {
            $color = '#DCE9D8';
        } elseif (strpos($isTitle, 'title') !== false) {
            $color = '#248C44';
        } else {
            $color = '#F4F6F4';
        }
    } elseif (strpos($title, 'Your order has been cancelled') !== false) {
        if (strpos($isTitle, 'border') !== false) {
            $color = '#E2B6BC';
        } elseif (strpos($isTitle, 'title') !== false) {
            $color = '#DF3F56';
        } else {
            $color = '#FEEEF0';
        }
    } else {
        if (strpos($isTitle, 'border') !== false) {
            $color = '#DADBFF';
        } elseif (strpos($isTitle, 'title') !== false) {
            $color = '#2E317E';
        } else {
            $color = '#EBEBFF';
        }
    }

    return $color;
}

//Set time ago functionality...G1
function getTimeAgo($utcDate)
{
    try {
        // Parse the UTC date properly
        $utcDateTime = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $utcDate, 'UTC');
        
        // Convert to Dubai timezone
        $uaeDateTime = $utcDateTime->timezone('Asia/Dubai');

        return $uaeDateTime->diffForHumans();
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}


function isOrderStatusChange(?string $orderStatus, ?string $cStatus): ?bool
{

    if (
        ($orderStatus === "Confirmed" && $cStatus === "Procesed") ||
        ($orderStatus === "Completed" && $cStatus === "Procesed") ||
        ($orderStatus === "Out_For_Delivery" && $cStatus === "Procesed") ||
        ($orderStatus === "Ready For Pick Up" && $cStatus === "Procesed")
    ) {
        return true;
    }

    if (
        ($orderStatus === "Ready For Pick Up" && $cStatus === "Ready") ||
        ($orderStatus === "Completed" && $cStatus === "Ready") ||
        ($orderStatus === "Out_For_Delivery" && $cStatus === "Ready")
    ) {
        return true;
    }

    if (
        ($orderStatus === "Out_For_Delivery" && $cStatus === "out") ||
        ($orderStatus === "Completed" && $cStatus === "out")
    ) {
        return true;
    }

    if ($orderStatus === "Cancelled" && $cStatus === "Cancelled") {
        return true;
    }

    if ($orderStatus === "Completed" && $cStatus === "completed") {
        return true;
    }

    return false;
}

 function correctSpelling($input, $dictionary)
{
    $shortest = -1;
    $closest = '';

    foreach ($dictionary as $word) {
        $lev = levenshtein($input, $word);

        if ($lev == 0) {
            return $word;
        }

        if ($lev <= $shortest || $shortest < 0) {
            $closest  = $word;
            $shortest = $lev;
        }
    }

    return $closest;
}

function smartCorrect($input, $data) {
    $inputPhonetic = metaphone($input);
    $matches = [];

    foreach ($data as $item) {
        if (metaphone($item) === $inputPhonetic) {
            similar_text($input, $item, $percent);
            $matches[$item] = $percent;
        }
    }

    arsort($matches);
    return key($matches) ?: null;
}

function detectBrowser($request)
{
    $userAgent = $request->header('User-Agent');
  //  print_r($userAgent);

    if (stripos($userAgent, 'OPR/') !== false || stripos($userAgent, 'Opera') !== false) {
        $browser = 'Opera';
    } elseif (stripos($userAgent, 'Chrome') !== false && stripos($userAgent, 'Edg') === false) {
        $browser = 'Chrome';
    } elseif (stripos($userAgent, 'Firefox') !== false) {
        $browser = 'Firefox';
    } elseif (stripos($userAgent, 'Safari') !== false && stripos($userAgent, 'Chrome') === false) {
        $browser = 'Safari';
    } elseif (stripos($userAgent, 'Edg') !== false) {
        $browser = 'Edge';
    } elseif (stripos($userAgent, 'MSIE') !== false || stripos($userAgent, 'Trident') !== false) {
        $browser = 'Internet Explorer';
    } else {
        $browser = 'Other';
    }

    return $browser;
    // response()->json(['browser' => $browser]);
}
