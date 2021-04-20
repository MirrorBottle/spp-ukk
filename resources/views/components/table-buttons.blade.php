<div class="text-right">
    <a href='{{route("$route.show", $data->id)}}' class="btn btn-primary btn-sm mr-1">
        <i class="fas fa-eye mr-1"></i>
        Detail
    </a>
    <a href="{{route("$route.edit", $data->id)}}" class="btn btn-warning btn-sm mr-1">
        <i class="fas fa-pen mr-1"></i>
        Edit
    </a>
    <button data-url="{{route("$route.destroy", $data->id)}}" data-url-callback="{{route("$route.index")}}" class="btn btn-danger btn-sm mr-1 delete-button">
        <i class="fas fa-trash-alt mr-1"></i>
        Hapus
    </button>
</div>