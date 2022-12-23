<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <form method="GET">
            <div class="row">
                <div class="col">
                    <select class="custom-select" id="filter_company_id" name="company_id">
                        @foreach ($companies as $id => $name)
                            <option value="{{ $id }}" {{ $id == request('company_id') ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="form-control" placeholder="Search..." aria-label="Search..."
                            aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="btn-clear">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
