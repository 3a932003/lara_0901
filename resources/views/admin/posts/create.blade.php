@extends('admin.layouts.master')

@section('page-title', 'Create article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
        <strong>錯誤！</strong> 請修正以下問題：
        <ul>
            <li>錯誤 1</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!--路由1從哪抓回來-->
    <form action="{{route('admin.posts.store')}}" method="post"><!--1路徑 action 2屬性動詞 method:get那些-->
        @method('post')
        <!--csrf防止攻擊確認storage/framework/sessions有沒有相同密碼-->
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">文章標題</label>
            <!--屬性跟資料表中的欄位一樣-->
            <input id="title" name="title" type="text" class="form-control" placeholder="請輸入文章標題">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">文章內容</label>
            <textarea id="content" name="content" class="form-control" rows="10" placeholder="請輸入文章內容"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
