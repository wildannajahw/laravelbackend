<form class="d-inline" action="{{route('categories.delete-permanent', ['id' => $category- >id])}}" method="POST" onsubmit="return confirm('Delete this category permanently?')">
  @csrf
  <input type="hidden" name="_method" value="DELETE"/>
  <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
</form>
