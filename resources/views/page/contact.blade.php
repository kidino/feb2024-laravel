@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <div class="row mb-5">
        <div class="col">
            <h3 class="border-bottom">Contact Us</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-6">
            <form action="{{ route('contact') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="60123344555">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message for us</label>
                    <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                </div>

                <div>
                    <input type="checkbox" name="checkbox[]" value="ali" id=""> ali
                </div>

                <div>
                    <input type="checkbox" name="checkbox[]" value="siti" id=""> siti
                </div>

                <div>
                    <input type="checkbox" name="checkbox[]" value="atan" id=""> atan
                </div>

                <div>
                    <input type="checkbox" name="checkbox[]" value="minah" id=""> minah
                </div>

                <div>
                    <input type="checkbox" name="checkbox[]" value="ah chong" id=""> ah chong
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <div class="col-6">

            <p>Or you can also get in touch with us using the following details</p>
            <h5>Taming Tech Sdn Bhd</h5>
            <p>321A, Tingkat 1, Lorng Selangor<br>Taman Melawati,<br>53100 Kuala Lumpur</p>
            <p><strong>Email: </strong>hq@tamingtech.my</p>
            <p><strong>Call or WhatsApp: </strong><a href="httsp://wa.me/60134464601">+60134464601</a></p>

        </div>
    </div>
</div>
@endsection