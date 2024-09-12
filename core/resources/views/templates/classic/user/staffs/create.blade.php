@extends($activeTheme.'layouts.app')
@section('title', ___('Add Staff'))
@section('content')

    <form id="staffForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="restaurant">Restoran Seç</label>

          <select name="restaurant_id" id="restaurant" class="submit-field">
              @foreach($restaurants as $restaurant)
                  <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
              @endforeach
          </select>
      </div>
        <!-- Dashboard Box -->
        <div class="dashboard-box margin-top-0">
           
            <div class="content with-padding padding-bottom-10">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="submit-field">
                            <h5>{{ ___('Staff Name') }}</h5>
                            <input type="text" id="store-slug" class="with-border" name="name"/>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="submit-field">
                            <h5>{{ ___('Staff SurName') }}</h5>
                            <input type="text" class="with-border" name="surname" value="">
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                        <div class="submit-field">
                            <h5>{{ ___('email') }}</h5>
                            <input type="mail" class="with-border" name="email" value="">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="submit-field">
                            <h5>{{ ___('Phone') }}</h5>
                            <input type="tel" class="with-border" name="phone" value="">
                        </div>
                    </div>
                  
                    <div class="col-xl-6">
                         <div class="submit-field">
                             <h5>{{ ___('staff_hiredate') }}</h5>
                             <input type="date" class="with-border" name="hire_date" value="">
                         </div>
                     </div>
                     
                     <div class="col-xl-6">
                         <div class="submit-field">
                           
                           
                              <h5>{{ ___('staff_salary') }} ₺</h5>
                              <div class="input-group-prepend">
                              </div>
                              <input type="text" class="with-border form-control" name="salary" value="{{ old('salary') }}" step="100.00" min="18000" placeholder="100">
                         </div>
                     </div>
                     <div class="col-xl-6">
                         <div class="submit-field">
                             <h5>{{ ___('staff_position') }}</h5>
                             <input type="text" class="with-border" name="position" value="">
                         </div>
                     </div>
              
                    <div class="col-xl-6 tw-between">
                         <label for="status">{{___('staff_status')}}</label>
                         <input name="status" id="" type="radio" value="">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="button ripple-effect margin-top-30">{{ ___('Save') }}</button>
    </form>

@endsection

@push('scripts_vendor')
@endpush
   
@push('scripts_at_bottom')
    <script>
        $(document).ready(function() {
            $('#staffForm').on('submit', function(e) {
                e.preventDefault(); // Sayfanın yeniden yüklenmesini önler
                
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('save_staff') }}", // Formun gönderileceği URL
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Başarılı istek sonrası yapılacak işlemler
                        alert('Personel başarıyla eklendi!');
          
                        // Başka işlemler, örneğin formu resetlemek:
                        $('#staffForm')[0].reset();
                    },
                    error: function(xhr) {
                        // Hatalı istek sonrası yapılacak işlemler
                        console.error(xhr.responseText);
                        alert('Personel eklenirken bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
        });
    </script>
@endpush
