<div>
    <div class="btn-group">
        @foreach ($actions as $actionName => $routeName)
            @if ($actionName == 'pending' && $status == 0)
                <div class="mr-1">
                    <form action="{{ $routeName }}" method="POST">
                        @csrf
                        @method('put')
                        <button class="btn btn-danger btn-sm" type="submit" title="Make Complete">
                            {{ bladeIcon('inactive') }}
                        </button>
                    </form>
                </div>
            @endif

            @if ($actionName == 'completed' && $status == 1)
                <div class="mr-1">
                    <form action="{{ $routeName }}" method="POST">
                        @csrf
                        @method('put')
                        <button class="btn btn-warning btn-sm" type="submit" title="Make Pending">
                            {{ bladeIcon('active') }}
                        </button>
                    </form>
                </div>
            @endif



            @if ($actionName == 'print')
                <div class="mr-1">
                    <a href="{{ $routeName }}" class="btn btn-sm btn-primary" title="Print Here">
                        {{bladeIcon('print')}}
                    </a>
                </div>
            @endif
            @if ($actionName == 'delete')
                <div>
                    <form action="{{ $routeName }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm confirm-text" type="submit" title="Delete Now">
                            {{bladeIcon('delete')}}
                        </button>
                    </form>
                </div>
            @endif
        @endforeach

        @if ($actionName == 'delivered' && $status == 'transit')
            <div class="mr-1">
                <form action="{{ $routeName }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-success btn-sm" type="submit" title="Delivered Now">
                        {{bladeIcon('deliver')}}
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

