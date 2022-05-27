@extends('layouts.app')

@section('content')
<style>
  .wid{
   width:80%;
  }

  .center{
     width:80%;
  }

  .left{
    text-align: left;
  }

  .customr_button{
    padding: 10px;
  }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="  ">
              <div class="card-header">
                <a href="{{ route('home') }}">顧客一覧へ戻る</a> 
              </div>
              <form action="{{ route('edit_update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $edit_customers[0]['id'] }}">
                <div class="card-body"> 
                  <table>
                    <tr>
                      <th>名前:</th>
                      <td><input type="text" name="name" class="form-control" placeholder="名前は必須です" value="{{ $edit_customers[0]['name'] }}" required ></td>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </tr>
                    <tr>
                      <th>会社名:</th>
                      <td><input type="text" name="company" class="form-control" placeholder=""  value="{{ $edit_customers[0]['company'] }}"></td>
                    </tr>
                    <tr>
                      <th>メモ:</th>
                      <td><textarea name="memo" id="" cols="30" rows="4" class="form-control" placeholder="" value="">{{ $edit_customers[0]['memo'] }}</textarea>
                      <td class="customr_button">
                        <br>
                        <br>
                        <button type="submit" name="update" class="btn btn-primary">顧客情報更新</button>
                        <button type="button" class="btn btn-danger mb-8" data-toggle="modal" data-target="#customer_delete">顧客情報を削除</button>
                      </td>
                    </tr>
                  </table>
                </div>
              </form>
              <table class="table table-striped">
              <thead>
              <tr>
              <th>ボトル種類 <a href="" data-toggle="modal" data-target="#bottle_update">種類編集</a></th>
              <th>ボトル名</th>
              <th>ボトル残量</th>
              <th>更新/削除</th>
              </tr>
              </thead>
                <tbody>
                  <form action="{{ route('register_customer_bottle') }}" method="POST">
                  <tr>
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $edit_customers[0]['id'] }}">
                    <td>
                      <select class="form-select" id="" name="product_name">
                      @foreach ($bottles as $bottle)
                      <option value="{{ $bottle['product_name'] }}">{{ $bottle['product_name'] }}</option>
                      @endforeach
                      </select>
                    </td>
                    <td><input type="text" name="bottle_name" class="form-control wid"></td>
                    <td><input type="text" name="amount" class="form-control wid"></td>
                    <td><button type="submit" class="btn btn-success">新規登録</button></td>
                    </tr>
                  </form>
                  @foreach($cutomer_bottles as $customer_bottle)
                  <form action="{{ route('customer_bottle') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $customer_bottle['id'] }}">
                  <input type="hidden" name="pruductname" value="{{ $customer_bottle['product_name'] }}">
                  <tr>
                    <td>{{ $customer_bottle['product_name'] }}</td>
                    <td><input type="text" name="bottle_name" class="form-control wid" value="{{ $customer_bottle['bottle_name'] }}"></td>
                    <td><input type="text" name="amount" class="form-control wid" value="{{ $customer_bottle['amount'] }}"></td>
                    <td>                    
                      <button type="submit" name="update" class="btn btn-primary">更新</button>
                      <button type="submit" name="delete" class="btn btn-danger">削除</button>
                    </td>
                  </tr>
                  @endforeach
                  </form>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
  <!-- 顧客情報削除 -->
  <div class="modal fade" id="customer_delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4><div class="modal-title" id="myModalLabel">削除確認画面</div></h4>
              </div>
              <div class="modal-body">
                <h5 class="p-3 mb-2 bg-warning text-dark">削除すると元に戻せません。<br>紐づいているボトルも削除されます。</h5>
                <label>削除しますか？</label>
              </div>
              <form action="{{ route('edit_update') }}" method="POST">
                  @csrf
                  <div class="modal-footer">
                      <input type="hidden" name='id'value="{{ $edit_customers[0]['id'] }}" >
                      <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                      <button type="submit"  name="delete" class="btn btn-danger">削除</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- ボトル情報編集 -->
  <div class="modal fade" id="bottle_update" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4><div class="modal-title" id="myModalLabel">ボトル情報編集</div></h4>
              </div>
              <div class="modal-body">
                <h5 class="p-3 mb-2 bg-warning text-dark">1行ごとにボトル名を入力してください</h5>
                <form action="{{ route('register_bottle') }}" method="POST">
                @csrf
                <div class="center">
                    <textarea name="product_name" cols="20" rows="10">@foreach($bottles as $bottle){{ $bottle['product_name'].PHP_EOL }}@endforeach</textarea>
                  <br>
                  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                  <button type="submit" class="btn btn-primary">更新</button>
                </div>
              </div>
              </form>
          </div>
      </div>
  </div>

@endsection



