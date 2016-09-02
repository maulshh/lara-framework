import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';

import {Hero} from '../hero';
import {HeroService} from '../services/hero.service';

@Component({
    selector: 'my-dashboard',
    templateUrl: 'app/views/dashboard.html',
    styleUrls: ['app/styles/dashboard.css']
})
export class DashboardComponent {
    heroes:Hero[] = [];

    constructor(private router:Router, private heroService:HeroService) {
    }

    ngOnInit() {
        this.heroService.getHeroes().then(heroes => this.heroes = heroes.slice(1, 5));
    }

    gotoDetail(hero:Hero) {
        let link = ['/detail', hero.id];
        this.router.navigate(link);
    }
}