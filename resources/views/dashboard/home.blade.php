@extends('layouts.dashboard')
<style>
    .branches-statistics-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 12px;
        margin-top: 2000px;

    }



    .branches-statistics-grid {
        grid-template-columns: repeat(4, 1fr);
    }

    .branch-block {
        width: 160px;
        height: 184px;
        background-color: lightblue;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #E7E7E7;
        overflow: hidden;
    }

    .branch-block-icon {
        color: #fff;
        font-size: 30px;
        background-color: var(--main-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        flex-shrink: 0;
        margin-bottom: 20px;
    }

    .statistic-title {
        color: #000;
        display: flex;
        text-align: center;
        justify-content: center;
        margin: 0;
        max-width: 131px;
        font-size: 14px;
        line-height: 1.6;
        height: 45px;
        overflow: hidden;
    }

    html[dir="ltr"] .statistic-title {
        max-width: 148px;

    }
</style>
@section('content')
<br> <br>

<div class="branches-statistics-grid">
    <div class="branch-block">
        <i class="las la-coins branch-block-icon"></i>
        <span class="statistic-no">
            {{$users}}
        </span>
        <h2 class="statistic-title">
            إجمالي عدد المستخدمين
        </h2>
    </div>
    <div class="branch-block">
        <i class="las la-coins branch-block-icon"></i>
        <span class="statistic-no">
            {{$products}}
        </span>
        <h2 class="statistic-title">
            إجمالي عدد المنتجات
        </h2>
    </div>
    <div class="branch-block">
        <i class="las la-truck branch-block-icon"></i>
        <span class="statistic-no">
            {{$categories}}
        </span>
        <h2 class="statistic-title">
            إجمالي عدد الاقسام
        </h2>
    </div>



    @endsection