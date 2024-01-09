<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__left">
                <div class="footer__left-top">
                    <a href="/">
                        <img loading="lazy" src="{{ asset('build/website/images/logo-l.png') }}" width="130" height="60" alt="{{ language('general.title') }}"
                            class="footer-logo">
                    </a>
                    <div class="footer__left-copyright">
                        {!! setting('copyright', true) !!}
                    </div>
                </div>

                <div class="footer__left-bottom">
                    <div class="footer__bottom-item social">
                        @if (!empty(json_decode(setting('social'))))
                            @foreach (json_decode(setting('social')) as $key => $value)
                                <a href="{{ $value->link }}" target="_blank" rel="nofollow" class="footer-social-link">
                                    <img src="/images/icons/{{ $value->name }}.svg" alt="{{ $value->name }}"
                                        class="footer-social-link-img">
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="footer__bottom-item contacts">
                        @if (!empty(setting('email')))
                            <a href="mailto:{{ setting('email') }}" class="contacts-info-line">
                                <img src="/images/icons/contacts-email-white.svg" alt=""
                                    class="contacts-info-line-img">
                                <div class="contacts-info-line-text">
                                    {{ setting('email') }}
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="footer__bottom-item contacts">
                        @if (!empty(setting('address', true)))
                            <a href="{{ setting('map') }}" class="contacts-info-line">
                                <img src="/images/icons/contacts-location-white.svg" alt=""
                                    class="contacts-info-line-img">
                                <div class="contacts-info-line-text">
                                    {{ setting('address', true) }}
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer__right">
                <nav>
                    <ul class="footer__right-menu">
                        @foreach ($footerMenu as $item)
                            <li><a href="{{ $item->link }}">{{ $item->label }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="footer__right-menu">
                        @foreach ($footerMenuHeaderItem as $item)
                            <li><a href="{{ $item->link }}">{{ $item->label }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<style>
    footer {
  flex: 0 0 auto;
  margin-top: 120px;
}
@media (max-width: 1200px) {
  footer {
    margin-top: 60px;
  }
  
}
.footer {
  background: #111;
  padding: 50px 0px;
}
.footer__inner {
  display: flex;
}
@media (max-width: 1200px) {
  .footer__inner {
    flex-direction: column;
  }
}
.footer__left {
  display: flex;
  flex-direction: column;
  max-width: 400px;
  width: 100%;
}
@media (max-width: 1200px) {
  .footer__left-top {
    order: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
  }
}
@media (max-width: 1200px) {
  .footer__left {
    max-width: 100%;
    width: 100%;
  }
}
.footer__left-copyright {
  margin-top: 12px;
  color: #FFF;
  line-height: 21px;
  font-size: 15px;
}
.footer__left-bottom {
  margin-top: 40px;
  margin-left: -6px;
}
@media (max-width: 1200px) {
  .footer__left-bottom {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
}
.footer__bottom-item + .footer__bottom-item {
  margin-top: 24px;
}
@media (max-width: 1200px) {
  .footer__bottom-item + .footer__bottom-item {
    margin-top: 10px;
  }
}
.footer__bottom-item.social {
  display: flex;
  margin-left: -8px;
}
.footer__bottom-item.social .footer-social-link {
  height: 38px;
}
.footer__bottom-item.social .footer-social-link-img {
  height: 100%;
}
.footer__bottom-item.contacts a {
  display: flex;
  color: #FFF;
  font-size: 15px;
  align-items: flex-start;
}
@media (max-width: 1200px) {
  .footer__bottom-item.social {
    margin-left: 0px;
    order: 1;
  }
}
.footer__right {
    width: 100%;
    margin-left: auto;
    display: flex;
    justify-content: flex-end;
}
.footer__right nav {
  display: flex;
}
.footer__right nav ul {
  -moz-column-count: 3;
       column-count: 3;
}
.footer__right nav ul li {
  min-width: 190px;
}
.footer__right nav ul li + li {
  margin-top: 5px;
}
.footer__right nav ul a {
  font-size: 16px;
  line-height: 20px;
  color: #FFF;
  transition: all 0.3s;
}
.footer__right nav ul a:hover {
  color: #AC14F3;
}
.footer__right nav ul + ul {
  margin-left: 65px;
  -moz-column-count: 1;
       column-count: 1;
}
@media (max-width: 1200px) {
  .footer__right {
    margin-left: 0px;
    order: -1;
    margin-right: auto;
    justify-content: left;
  }
}
@media (max-width: 992px) {
  .footer__right nav {
    flex-direction: column;
  }
  .footer__right nav ul {
    -moz-column-count: 2;
         column-count: 2;
  }
  .footer__right nav ul li {
    min-width: auto;
  }
  .footer__right nav ul + ul {
    -moz-column-count: 2;
         column-count: 2;
    margin-left: 0px;
    margin-top: 10px;
  }
}
@media (max-width: 992px) {
  .footer {
    padding: 25px 0;
  }
}

</style>