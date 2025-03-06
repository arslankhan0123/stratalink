<link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
<link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tmp/css/mermaid.min.css') }}" />
<script src="{{ asset('tmp/js/3.7.1-jquery.min.js') }}"></script>
<style>
    .heading_style h1,
    h2 {
        text-align: center;
        text-transform: uppercase;
        padding-bottom: 5px;
    }

    .heading_style h1:before {
        width: 28px;
        height: 5px;
        display: block;
        content: "";
        position: absolute;
        bottom: 3px;
        left: 50%;
        margin-left: -14px;
        background-color: #b80000;
    }

    .heading_style h1:after {
        width: 100px;
        height: 1px;
        display: block;
        content: "";
        position: relative;
        margin-top: 25px;
        left: 50%;
        margin-left: -50px;
        background-color: #b80000;
    }

    .h-search-form {
        margin-top: 10rem;
        position: relative;
        padding: 100px;
        background: skyblue;
        text-align: center;
    }

    .h-search-form input {
        width: 70%;
        padding: 0 30px;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        font-size: 16px;
        text-transform: capitalize;
        position: relative;
        color: #333;
        height: 70px;
    }

    .h-search-form button {
        position: relative;
        right: 110px;
        height: 60px;
        color: #fff;
        background: blue;
        top: 7px;
        border-radius: 50px;
        border: none;
        width: 100px;
    }

    .h-search-form button:hover {
        background: darkblue;
    }

    .bg_image {
        background-image: url('https://images.pexels.com/photos/235986/pexels-photo-235986.jpeg?auto=compress&cs=tinysrgb&w=600');
        height: 100vh;
    }
</style>
<div class="bg_image">


    <div class="container pt-3">
        <div class="card w-50 mx-auto">
            <div class="card-header text-center">
                Welcome to StrataLink
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Your After Hours Emergncy Specialists</h5>
                <h4 class="card-title text-center mt-3">Thank you for calling Strata. Please be aware that if your issue is not Strata related you will be liable for cost associated.
                    DO YOU WISH TO PROCEED!
                </h4>
            </div>
            <a class="btn btn-primary text-center mt-3" href="{{ route('dashboard.staff') }}">Go to Dashbaord</a>

        </div>

        >
    </div>

    <div class="container mt-5">
        <div class="dropdown">
            <button class="btn w-100 btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                Select a Building
            </button>
            <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                <div id="dropdownItems">
                    @foreach ($data as $item)
                        <a class="dropdown-item"
                            href="{{ route('dashboard.staff', ['building_id' => $item->id]) }}">{{ $item->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('tmp/js/bootstrap.bundle.min.js') }}"></script>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('#dropdownItems .dropdown-item');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
