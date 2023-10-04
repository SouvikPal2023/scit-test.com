<div class="mb-3">
  <label class="form-label" for="FaqQuestion">Email</label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="email" 
           class="form-control @error('email') is-invalid @enderror"
           id="Faqemail" 
           placeholder="Enter email" 
           value="{{old('email', isset($contact->email) ? $contact->email:'')}}" 
            />
  </div>
</div>
<div class="mb-3">
  <label class="form-label" for="contactQuestion">Name</label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="name" 
           class="form-control @error('name') is-invalid @enderror"
           id="contactname" 
           placeholder="Enter name" 
           value="{{old('name', isset($contact->name) ? $contact->name:'')}}" 
            />
  </div>
</div>
<div class="mb-3">
  <label class="form-label" for="contactQuestion">Subject</label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="subject" 
           class="form-control @error('subject') is-invalid @enderror"
           id="contactsubject" 
           placeholder="Enter subject" 
           value="{{old('subject', isset($contact->subject) ? $contact->subject:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="contactQuestion">Message</label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="message" 
           class="form-control @error('message') is-invalid @enderror"
           id="contactmessage" 
           placeholder="Enter message" 
           value="{{old('message', isset($contact->message) ? $contact->message:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="contactQuestion">Phone</label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="phone" 
           class="form-control @error('phone') is-invalid @enderror"
           id="contactphone" 
           placeholder="Enter phone" 
           value="{{old('phone', isset($contact->phone) ? $contact->phone:'')}}" 
            />
  </div>
</div>


<!-- <button type="submit" class="btn btn-primary">{{isset($faq) ? 'Update' : 'Create'}}</button> -->
<a class="btn btn-dark" href="{{ route('admin.contact.index') }}">Go Back</a>




@include('admin.common.script')




