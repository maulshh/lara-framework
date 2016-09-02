import { provideRouter, RouterConfig }  from '@angular/router';
import { HeroesComponent } from './components/heroes.component';
import { HeroDetailComponent } from './components/hero-detail.component';
import {DashboardComponent} from './components/dashboard.component';

const routes: RouterConfig = [
  {
    path: 'heroes',
    component: HeroesComponent
  },
  {
    path:'dashboard',
    component:DashboardComponent
  },
  {
    path:'',
    redirectTo: '/dashboard',
    terminal: true
  },
  {
    path:'detail/:id',
    component: HeroDetailComponent
  }
];

export const APP_ROUTER_PROVIDERS = [
  provideRouter(routes)
];
