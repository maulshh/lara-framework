System.register(['@angular/core', '@angular/router', '../hero', '../services/hero.service'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, router_1, hero_1, hero_service_1;
    var HeroDetailComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (hero_1_1) {
                hero_1 = hero_1_1;
            },
            function (hero_service_1_1) {
                hero_service_1 = hero_service_1_1;
            }],
        execute: function() {
            let HeroDetailComponent = class HeroDetailComponent {
                constructor(heroService, route) {
                    this.heroService = heroService;
                    this.route = route;
                    this.close = new core_1.EventEmitter();
                    this.navigated = false;
                }
                ngOnInit() {
                    this.sub = this.route.params.subscribe(params => {
                        if (params['id'] !== undefined) {
                            let id = +params['id'];
                            this.navigated = true;
                            this.heroService.getHero(id).then(hero => this.hero = hero);
                        }
                        else {
                            this.navigated = false;
                            this.hero = new hero_1.Hero();
                        }
                    });
                }
                ngOnDestroy() {
                    this.sub.unsubscribe();
                }
                save() {
                    this.heroService.save(this.hero).then(hero => {
                        this.hero = hero;
                        this.goBack(hero);
                    }).catch(error => this.error = error);
                }
                goBack(savedHero = null) {
                    this.close.emit(savedHero);
                    if (this.navigated) {
                        window.history.back();
                    }
                }
            };
            __decorate([
                core_1.Input(), 
                __metadata('design:type', hero_1.Hero)
            ], HeroDetailComponent.prototype, "hero", void 0);
            __decorate([
                core_1.Output(), 
                __metadata('design:type', Object)
            ], HeroDetailComponent.prototype, "close", void 0);
            HeroDetailComponent = __decorate([
                core_1.Component({
                    selector: 'my-hero-detail',
                    templateUrl: 'app/views/hero-detail.html'
                }), 
                __metadata('design:paramtypes', [hero_service_1.HeroService, router_1.ActivatedRoute])
            ], HeroDetailComponent);
            exports_1("HeroDetailComponent", HeroDetailComponent);
        }
    }
});
