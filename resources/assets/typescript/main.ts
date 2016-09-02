import {InMemoryBackendService, SEED_DATA} from 'angular2-in-memory-web-api';
import {InMemoryDataService} from './services/in-memory-data.service';
import {bootstrap}    from '@angular/platform-browser-dynamic';
import {HTTP_PROVIDERS, XHRBackend} from '@angular/http';
import {AppComponent} from './app.component';
import {APP_ROUTER_PROVIDERS} from './app.routes';
bootstrap(AppComponent, [APP_ROUTER_PROVIDERS, HTTP_PROVIDERS,
    {provide: XHRBackend, useClass: InMemoryBackendService},
    {provide: SEED_DATA, useClass: InMemoryDataService}]
);
