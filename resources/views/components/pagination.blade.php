<div class="card-footer clearfix">
    <div class="float-left">
        <form action="{{ route("$routeUrl") }}" method="GET">
            <div class="input-group">
                <label class="input-group-addon">Rows Per Page:</label>
                <select class='input-control' name="per_page" id="per_page" onchange="this.form.submit()">
                    @foreach($perPageOptions as $option)
                        <option value="{{ $option }}" {{ $option == $entity->perPage() ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    <div class="float-right">
        {{ $entity->appends(['per_page' => $entity->perPage()])->links() }}
    </div>
</div>
