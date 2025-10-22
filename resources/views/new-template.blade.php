@extends('layouts.app')

@section('content')
<div class="containers" >
    <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
        
        
<div class="container-xxl flex-grow-1 container-p-y">
              
    <div class="content">  
    <!-- Form Section -->
     
        <div class="form-section">
        <h2>Create Template</h2>
<form method="post" action="/save-template">
    @csrf 
        <div class="height_auto_wrap">
        <div class="form-group">
            <label for="template-name">Template name*</label>
            <small class="small_clr">Give your message template a name.</small>
            <input type="text" id="template-name" name="template_name" placeholder="Enter template name">
            <small class="small_clr">Template names can only contain small letters, numbers and underscores.</small>
        </div>

        <div class="form-group">
            <label>Category*</label>
            <div class="category-options">
            <div class="radio-button">
                <label class="radio-button__label-wrapper" for="market">
                <h3 class="radio-button__label-title">
                    Marketing
                </h3>
                <span class="radio-button__label-subtext">
                    Send promo offers, product offers and more to increase awareness and engagement.
                </span>
                <input type="radio" name="category" id="market" value="marketing" class="radio-button__input" >
                <div class="radio-button__custom-indicator"></div>  
                </label>
            </div>
            <div class="radio-button">
                <label class="radio-button__label-wrapper" for="utility">
                <h3 class="radio-button__label-title">
                Utility
                </h3>
                <span class="radio-button__label-subtext">
                    Send account updates, order updates, alerts and more to share important information.
                </span>
                
                <input type="radio" name="category" id="utility" value="utility" class="radio-button__input" >
                <div class="radio-button__custom-indicator"></div>  
                </label>
            </div>
            <div class="radio-button">
                <label class="radio-button__label-wrapper" for="authentication">
                <h3 class="radio-button__label-title">
                Authentication
                </h3>
                <span class="radio-button__label-subtext">
                    Send codes that allow your customers to access their accounts.
                </span>
                
                <input type="radio" name="category" id="authentication" value="authentication" class="radio-button__input" >
                <div class="radio-button__custom-indicator"></div>  
                </label>
            </div>
            </div>
        </div>

        <div style="display:none" class="form-group">
            <label>Template Type*</label>
            <select id="templateSelect">
            <option value="custom_msg">Custom Message</option>
            <option value="pro_msg">Product Message</option>
            <option value="carousel_msg">Carousel Message</option>
            </select>
        </div>

        <div style="display:none" class="form-group">
            <label>Language*</label>
            <small class="small_clr">Choose which languages your message template will be sent in.</small>
            <select id="templateSelect">
            <option value="custom">English</option>
            <option value="system">Afrikkans</option>
            <option value="system">French</option>
            </select>
        </div>

        <div style="display:none" class="form-group">
            <label>Template Labels*</label>
            <small class="small_clr">Define what use-case does this template serves e.g Account update, OTP, etc in 2-3 words</small>
            <input type="text" id="template-name" placeholder="Template Labels">
        </div>

        <div class="form-group">
            <label>Header (Optional) </label>
            <small class="small_clr">Add a 60 character title to your message. Only one variable is supported in the header.</small>
            <select id="headerSelect" name="header_type">
            <option value="none">None</option>
            <option value="text">Text</option>
            <option value="image">Image</option>
            <option value="video">Video</option>
            <option value="document">Document</option>
            </select>

            <!-- Hidden input sections -->
            <div id="textHeader" class="header-input" style="display:none; margin-top:10px;">
            <input type="text" id="headerText" name="header_text" class="form-control" placeholder="Enter header text (max 60 characters)">
            </div>

            <div id="imageHeader" class="header-input" style="display:none; margin-top:10px;">
            <input type="file" id="headerImage" name="header_image_url" class="form-control" accept="image/*">
            </div>

           
        </div>

        <div class="info-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#5956D6" viewBox="0 0 256 256" name="info" style="cursor: auto;"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg> The text limit in the body should be less than 550 characters and emojis should be less than 10 to avoid any template rejection.
        </div>

        <!-- Message Body -->
        <div class="form-group">
            <label>Body*</label>
            <small class="small_clr">Enter the text for your message in the language you have selected.</small>
            <textarea id="body" name="body" rows="6" placeholder="Enter your message..."></textarea>
            <div class="form-actions">
            <button class="add_var"> + Add variable </button>
            <button id="boldBtn"><b>B</b></button>
            <button><i>I</i></button>
            <button><u>U</u></button>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-section">
            <div class="form-group">
            <label>Footer (Optional)</label>
            <small class="small_clr">Add a 60 character footer to your message. Variables are not supported in the footer.</small>
            <input type="text" name="footer" maxlength="60" placeholder="Footer text">
            </div>
        </div>

        <!-- Buttons -->
        <div class="button-section">
            <div class="form-group">
            <label>Buttons (Optional)</label>
            <small class="small_clr">Please choose buttons to be added to the template. You can choose upto 10 buttons</small>

            <div style="display:none" id="quickReplyDiv" class="quick_rply" style="display:none;">
                <h2>Quick Reply</h2>
                <div class="form-group pad_12">
                    <input type="text" placeholder="Quick Reply title">
                </div>
            </div>
            <div class="btn-group">
                <button class="btn-outline-rply">+ Quick Reply</button>
                <button class="btn-outline">+ Add CTA</button>
            </div>
            </div>
        </div>

        <!-- Bottom Actions -->
        <div class="bottom-actions">
            <button class="btn-clear">Clear all</button>
            <button class="btn-primary">Preview and Submit</button>
        </div>
        </div>
         </form>
        </div>

        <!-- Preview Section -->
        <div class="preview">
        <h3>Preview</h3>
        <div class="chat-bubble">Your message will appear here...</div>
        <div class="time">12:54 PM</div>
        </div>
       
    </div>
  </div>
 </div>
  </div>
   
@endsection
