@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">名前</th>
                        <th scope="col">ボトル</th>
                        <th scope="col">会社名</th>
                        <th scope="col">メモ</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                      <tr>
                        <td><a href="">{{ $customer['name'] }}</a></td>
                        <?php 
                          array_key_exists($customer['id'],$customer_bottles)?$bottle_lists= $customer_bottles[$customer['id']] : $bottle_lists= [];
                        ?>
                        <td>
                        @foreach($bottle_lists as $bottle_list)
                          ●{{ $bottle_list['product_name'] }}({{ $bottle_list['amount'] }})⇨{{ $bottle_list['bottle_name'] }}
                          <br>
                        @endforeach
                        </td>
                        <td>{{ $customer['company'] }}</td>
                        <td>{{ $customer['memo'] }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
