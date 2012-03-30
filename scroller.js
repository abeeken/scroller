function scroller(element,scroller_width,column_width,no_columns,loopround){
	//Scroller class Version 1
	//Author: Andrew Beeken
	//Website: http://www.andrewbeeken.co.uk
	
	//For usage, check out the accompanying .php page or the readme file at https://github.com/abeeken/scroller
	
	this.element = element;
	this.scroller_width = scroller_width;
	this.column_width = column_width;
	this.no_columns = no_columns;
	this.loopround = loopround;
	
	//This is the width of the area which moves
	this.inner_width = this.column_width * this.no_columns;				
	
	//This is the number of times we can move that area before we start to see nothing
	this.no_iterations = Math.ceil(this.inner_width/this.scroller_width);
	
	this.current_iteration = 1;
	
	this.left_scroll = function left_scroll(){
			if ( this.current_iteration < this.no_iterations ){
				new Effect.Move(this.element, { x: -this.scroller_width, y: 0, mode: 'relative' });
				this.current_iteration = this.current_iteration+1;
			}else if ( this.loopround ){
				new Effect.Move(this.element, { x: 0, y: 0, mode: 'absolute' });
				this.current_iteration = 1;
			}
			return false;
		}
		
	this.right_scroll = function right_scroll(){
			if ( this.current_iteration > 1){
				new Effect.Move(this.element, { x: this.scroller_width, y: 0, mode: 'relative' });
				this.current_iteration = this.current_iteration-1;
			}else if ( this.loopround ){
				new Effect.Move(this.element, { x: -this.scroller_width*( this.no_iterations-1 ), y: 0, mode: 'absolute' });
				this.current_iteration = this.no_iterations;
			}
			return false;
		}
}					