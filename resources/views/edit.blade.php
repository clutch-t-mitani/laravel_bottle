@extends('layouts.app')

@section('content')
<style>
  .wid{
   width:80%;
  }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                顧客情報
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
                    </tr>
                  </table>
                  <br>
                  <button type="submit" name="update" class="btn btn-primary">更新</button>
                  <button type="submit" name="delete" class="btn btn-danger">顧客情報削除</button>
                </div>
              </form>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ボトル種類</th>
                    <th>ボトル名</th>
                    <th>ボトル残量</th>
                    <th>更新/削除</th>
                  </tr>
                </thead>
                <tbody>
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
                  </form>
                  @endforeach
                </tbody>
              </table>
              <hr>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ボトル登録</th>
                    <th>ボトル名</th>
                    <th>ボトル残量</th>
                    <th>登録</th>
                  </tr>
                </thead>
                <tbody>                     
                   <form action="{{ route('register_customer_bottle') }}" method="POST">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $edit_customers[0]['id'] }}">
                    <tr>
                      <td>
                        <select class="form-select" id="" name="product_name">
                        @foreach ($bottles as $bottle)
                          <option value="{{ $bottle['product_name'] }}">{{ $bottle['product_name'] }}</option>
                        @endforeach
                      </select>
                      </td>
                      <td><input type="text" name="bottle_name" class="form-control wid"></td>
                      <td><input type="text" name="amount" class="form-control wid"></td>
                      <td><button type="submit" class="btn btn-primary">登録</button></td>
                    </tr>
                    </form>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
