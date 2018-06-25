<div class="pagination" style="font-size: 17px;">
  @if ($objects->currentPage() != 1)
  <a href="{{$objects->previousPageUrl()}}" class="page-link"><i class="fa fa-caret-left"></i></a>
  @endif
  <span class="page-number">
    <select name="page_list" id="page-list" style="" >
      @for ($i = 1; $i <= ceil($objects->total()/$objects->perPage()); $i++)
      <option {{$objects->currentPage() == $i ? "selected" : ""}} value="{{$objects->url($i)}}">{{$i}}</option>
      @endfor
    </select>
    / <span id="total-page">{{$objects->lastPage()}}</span>
  </span>

  @if ($objects->currentPage() != $objects->lastPage())
  <a href="{{$objects->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
  @endif
</div>