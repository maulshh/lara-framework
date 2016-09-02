import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {Hero} from '../hero';
import {HeroService} from '../services/hero.service';
import {HeroDetailComponent} from './hero-detail.component';

@Component({
    selector: 'my-heroes',
    directives: [HeroDetailComponent],
    templateUrl: 'app/views/heroes.html',
    styleUrls: ['app/styles/heroes.css']
})

export class HeroesComponent implements OnInit {
    title = 'Tour of Heroes';
    heroes:Hero[];
    selectedHero:Hero;
    error;
    addingHero:boolean;

    constructor(private heroService:HeroService, private router:Router) {
    }

    ngOnInit() {
        this.getHeroes();
    }

    onSelect(hero:Hero) {
        this.selectedHero = hero;
    }

    getHeroes() {
        this.heroService.getHeroes().then(heroes => this.heroes = heroes);
    }

    addHero() {
        this.addingHero = true;
        this.selectedHero = null;
    }

    close(savedHero: Hero) {
        this.addingHero = false;
        if (savedHero) { this.getHeroes(); }
    }
    
    deleteHero(hero: Hero, event: any) {
        event.stopPropagation();
        this.heroService
            .delete(hero)
            .then(res => {
                this.heroes = this.heroes.filter(h => h !== hero);
                if (this.selectedHero === hero) { this.selectedHero = null; }
            })
            .catch(error => this.error = error);
    }

    gotoDetail(){
        this.router.navigate(['/detail', this.selectedHero.id]);
    }
}