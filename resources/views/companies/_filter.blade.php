<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                        aria-describedby="search-button" value="{{ request('search') }}" name="search"
                        id="search-input">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="reset-button">
                            <i class="fa fa-refresh"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="button" id="search-button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
