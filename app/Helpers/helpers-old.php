<?php
use Carbon\Carbon;

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
            case 'cancelled':
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
        $utcDateTime = Carbon::parse($utcDate, 'UTC');
        $uaeDateTime = $utcDateTime->timezone('Asia/Dubai');

        return $uaeDateTime->diffForHumans();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
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

