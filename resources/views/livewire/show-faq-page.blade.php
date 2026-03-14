<main>
    <section class="section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-6">
            <div class="section-title text-center">
              <p class="text-primary text-uppercase fw-bold mb-3">Frequent Questions</p>
              <h1>Frequently Asked Questions</h1>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <!-- Alpine.js Accordion state: activeFaq tracks which ID is open -->
            <div class="accordion accordion-border-bottom" id="accordionFAQ" x-data="{ activeFaq: 1 }">
                @if($faqs->isNotEmpty())
                    @php
                        $i=1;
                    @endphp
                    @foreach($faqs as $faq)
                        <div class="accordion-item" style="border-bottom: 1px solid #ddd; margin-bottom: 10px;">
                            <h2 class="accordion-header" style="cursor: pointer;">
                              <button 
                                class="accordion-button h5 border-0" 
                                :class="activeFaq === {{ $i }} ? '' : 'collapsed'"
                                type="button" 
                                @click="activeFaq = (activeFaq === {{ $i }} ? null : {{ $i }})"
                              >
                                {{$faq->question}}
                              </button>
                            </h2>
                            <div 
                                class="accordion-collapse" 
                                x-show="activeFaq === {{ $i }}" 
                                x-collapse
                                x-cloak
                            >
                              <div class="accordion-body py-3 content">
                                {!! $faq->answer !!}
                              </div>
                            </div>
                          </div>
                        @php
                            $i++;
                        @endphp  
                    @endforeach        
                @endif              
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
