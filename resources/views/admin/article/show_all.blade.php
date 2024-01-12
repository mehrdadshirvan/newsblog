@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row box_shadow bg-white bg-fff">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_0" style="padding: 0">
               <table class="table table-hover table-striped" style="direction: rtl">
                   <tr>
                       <th>
                           ردیف
                       </th>
                       <th>
                           نویسنده
                       </th>
                       <th>
                           عنوان
                       </th>
                       <th>
                           تصویر
                       </th>
                       <th>
                           ویرایش
                       </th>
                       <th>
                           حذف
                       </th>
                   </tr>
                   <?php $i=1; ?>
                   @foreach($article as $ar)
                    <tr id="ar_{{ $ar->id }}">
                        <td style="width: 15px">{{ $i }}</td>
                        <td>{{ $ar->writer }}</td>
                        <td>{{ $ar->title }}</td>
                        <td style="    width: 150px;"><img src="{{ url('/').$ar->avatar }}" style="    width: 150px;"></td>
                        <td style="width: 10px;">
                            <a href="{{ url('/admin/article/edit/').'/'.$ar->id }}" class="btn btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        <td style="width: 10px;">
                            <a href="#" onclick="delete_article({{ $ar->id }});" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                       <?php $i++; ?>
                   @endforeach
               </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row margin_10" style="margin: 10px auto">
            <div style="margin: auto;direction: rtl;">
                {{ $article->render() }}
            </div>
        </div>
    </div>

    <script>
        function delete_article(id){
            $.ajax({
                url: '{{ url('/admin/article/del') }}',
                data: "id=" + id + "&_token=" + "{{ csrf_token() }}",
                type: 'POST',
                success: function(data){
                    if(data == "ok"){
                        $("#ar_"+id).hide();
                    }else{
                       alert('error');
                    }
                }
            });
        }
    </script>
@endsection