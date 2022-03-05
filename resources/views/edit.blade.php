@extends('layouts.app')

@section('content')
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
                  <tr>
                    <td>{{ $customer_bottle['product_name'] }}</td>
                    <td>{{ $customer_bottle['bottle_name'] }}</td>
                    <td>{{ $customer_bottle['amount'] }}</td>
                    <td>                    
                      <button type="submit" class="btn btn-primary">更新</button>
                      <button type="button" class="btn btn-danger">削除</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
