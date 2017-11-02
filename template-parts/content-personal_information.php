						<section id="personal-information" class="card border-primary" itemscope itemtype="http://schema.org/Person">                            
							<div class="card-header bg-primary text-white">
								<i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Personal Information
							</div>
                            <div class="card-body">
                                <article class="card border border-white">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <figure class="figure">
                                                <img class="figure-img img-fluid rounded float-left" alt="" src="images/profile.png" itemprop="image">
                                            </figure>
                                            <div class="row">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-google" target="_blank">
                                                        <i class="fa fa-google"></i> </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-facebook" target="_blank">
                                                        <i class="fa fa-facebook"></i> </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-twitter" target="_blank">
                                                        <i class="fa fa-twitter"></i> </a>
                                                    </li>    
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-linkedin" target="_blank">
                                                        <i class="fa fa-linkedin"></i> </a>
                                                    </li>    
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-github" target="_blank">
                                                        <i class="fa fa-github"></i> </a>
                                                    </li>    
                                                    <li class="nav-item">
                                                        <a href="#" class="btn btn-social btn-block btn-stackoverflow" target="_blank">
                                                        <i class="fa fa-stack-overflow"></i> </a>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-group">
                                                <li class="list-group-item text-right" itemprop="name"><i class="fa fa-user float-left" aria-hidden="true"></i><h4 class="card-title"><?php the_field( 'first_name' ); ?>&nbsp;<?php the_field( 'surname' ); ?></h4></li>
                                                <li class="list-group-item text-right" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><i class="fa fa-map-marker float-left" aria-hidden="true"></i><span itemprop="streetAddress"><?php the_field( 'house_number' ); ?>&nbsp;<?php the_field( 'street_name' ); ?></span>&#44; &nbsp;<span itemprop="addressLocality"><?php the_field( 'city' ); ?></span>&nbsp;<span itemprop="postalCode"><?php the_field( 'postal_code' ); ?></span>&#44; &nbsp;<span itemprop="addressRegion"><?php the_field( 'nation' ); ?></span></li>
                                                <li class="list-group-item text-right" itemprop="url"><i class="fa fa-globe float-left" aria-hidden="true"></i>Website</li>
                                                <li class="list-group-item text-right" itemprop="telephone"><i class="fa fa-phone float-left"></i><a href="tel://000-000-0000"> 000-000-0000</a></li>
                                                <li class="list-group-item text-right" itemprop="email"><i class="fa fa-envelope float-left"></i><a href="mailto:john@example.com?subject=From the Website">john@example.com</a></li>
                                                <li class="list-group-item .col-md-2 text-right" itemprop="gender float-left">Sex</li>
                                                <li class="list-group-item .col-md-3 text-right" itemprop="birthDate"><i class="fa fa-calendar float-left" aria-hidden="true"></i>Date of birth</li>
                                                <li class="list-group-item .col-md-3 text-right" itemprop="nationality"><i class="fa fa-flag float-left" aria-hidden="true"></i>Nationality</li>
                                            </ul>
                                        </div>
                                    </div>             
                                </article>
                            </div>
						</section>