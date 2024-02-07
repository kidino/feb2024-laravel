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

            {{ $errors }}

            <form action="{{ route('contact') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" placeholder="Your Name" />
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" placeholder="name@example.com">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" 
                    class="form-control @error('phone') is-invalid @enderror" 
                    id="phone" name="phone" placeholder="+6012-334 4555">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message for us</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" 
                    id="message" name="message" rows="5"></textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div>
                    <input type="checkbox" name="officers[]" value="ali" id="ali">
                    <label for="ali">ali</label>
                </div>

                <div>
                    <input type="checkbox" name="officers[]" value="siti" id="siti">
                    <label for="siti">siti</label>
                </div>

                <div>
                    <input type="checkbox" name="officers[]" value="atan" id="atan"> 
                    <label for="atan">atan</label>
                </div>

                <div>
                    <input type="checkbox" name="officers[]" value="minah" id="minah"> 
                    <label for="minah">minah</label>

                </div>

                <div>
                    <input type="checkbox" name="officers[]" value="ah chong" id="ah-chong">  
                    <label for="ah-chong">ah chong</label>

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