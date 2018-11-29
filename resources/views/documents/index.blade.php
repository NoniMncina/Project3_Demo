@extends('layouts.app')

@section('content')
<style>
  .card-content2 {
    padding: 10px 7px;
  }
  /* --- for right click menu --- */
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  .task i {
    color: orange;
    font-size: 35px;
  }
  /* context-menu */
  .context-menu {
    padding: 0 5px;
    margin: 0;
    background: grey;
    font-size: 15px;
    display: none;
    position: absolute;
    z-index: 10;
    box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
  }
  .context-menu--active {
    display: block;
  }
  .context-menu_items {
    margin: 0;
  }
  .context-menu_item {
    border-bottom: 1px solid #ddd;
    padding: 12px 30px;
  }
  .context-menu_item:last-child {
    border-bottom: none;
  }
  .context-menu_item:hover {
    background: #fff;
  }
  .context-menu_item i {
    margin: 0;
    padding: 0;
  }
  .context-menu_item p {
    display: inline;
    margin-left: 10px;
  }
  .unshow {
    display: none;
  }
  /* ---------- LIVE-CHAT ---------- */

#live-chat {
	bottom: 0;
	font-size: 12px;
	right: 24px;
	position: fixed;
	width: 300px;
}

#live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 24px;
}

#live-chat h4:before {
	background: #1a8a34;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}

#live-chat h4 {
	font-size: 12px;
}

#live-chat h5 {
	font-size: 10px;
}

#live-chat form {
	padding: 24px;
}

#live-chat input[type="text"] {
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 8px;
	outline: none;
	width: 234px;
}

.chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

.chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
}

.chat {
	background: #fff;
}

.chat-history {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}

.chat-message {
	margin: 16px 0;
}

.chat-message img {
	border-radius: 50%;
	float: left;
}

.chat-message-content {
	margin-left: 56px;
}

.chat-time {
	float: right;
	font-size: 10px;
}

.chat-feedback {
	font-style: italic;	
	margin: 0 0 0 80px;
}
</style>
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">folder</i> Documents
        <button class="btn red waves-effect waves-light right tooltipped delete_all" data-url="{{ url('documentsDeleteMulti') }}" data-position="left" data-delay="50" data-tooltip="Delete Selected Documents"><i class="material-icons">delete</i></button>
        @can('upload')
          <a href="/documents/create" class="btn waves-effect grey darken-10 right tooltipped" data-position="left" data-delay="50" data-tooltip="Upload New Document"><i class="material-icons">file_upload</i></a>
        @endcan
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
         
          <!-- TABLE View -->
          <div id="tableView">
            <div class="row">
              <table class="bordered centered highlight responsive-table" id="myDataTable">
                <thead>
                  <tr>
                      <th></th>
                      <th>File Name</th>
                      <th>Owner</th>
                      <th>Department</th>
                      <th>Uploaded At</th>
                      <th>Expires At</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($docs) > 0)
                    @foreach($docs as $doc)
                    <tr id="tr_{{$doc->id}}">
                      <td>
                        <input type="checkbox" id="chk_{{ $doc->id }}" class="sub_chk" data-id="{{$doc->id}}">
                        <label for="chk_{{ $doc->id }}"></label>
                      </td>
                      <td>{{ $doc->name }}</td>
                      <td>{{ $doc->user->name }}</td>
                      <td>{{ $doc->user->department['dptName'] }}</td>
                      <td>{{ $doc->created_at->toDayDateTimeString() }}</td>
                      <td>
                        @if($doc->isExpire)
                          {{ $doc->expires_at }}
                        @else
                          No Expiration
                        @endif
                      </td>
                      <td>
                        <a href="documents/{{ $doc->id }}" class="tooltipped" data-position="left" data-delay="50" data-tooltip="View Details"><i class="material-icons">visibility</i></a>
                        <a href="documents/open/{{ $doc->id }}" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Open"><i class="material-icons">open_with</i></a>
                        <a href="documents/download/{{ $doc->id }}" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Download"><i class="material-icons">file_download</i></a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6"><h5 class="teal-text">No Document has been uploaded</h5></td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="live-chat">
		
		<header class="clearfix">
			
			<a href="#" class="chat-close">x</a>

			<h4>Thando</h4>

			<span class="chat-message-counter">3</span>

		</header>

		<div class="chat">
			
			<div class="chat-history">
				
				<div class="chat-message clearfix">
					
					<img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">13:35</span>

						<h5>Thando</h5>

						<p>Please share your history research document</p>

					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

				<div class="chat-message clearfix">
					
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">13:37</span>

						<h5>Nikkie</h5>

						<p>Sorry, I'm not really done with it but I'll share once I've finished compling it.</p>

					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

				<div class="chat-message clearfix">
					
					<img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">13:38</span>

						<h5>Messanger</h5>

						<p>sfri erwtuiyh weruougtiwajfu  eoiruj;oiws weroiurifs.</p>

					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

			</div> <!-- end chat-history -->

			<p class="chat-feedback">Your partner is typing…</p>

			<form action="#" method="post">

				<fieldset>
					
					<input type="text" placeholder="Type your message…" autofocus>
					<input type="hidden">

				</fieldset>

			</form>

		</div> <!-- end chat -->

	</div> <!-- end live-chat -->
<!-- right click menu -->
<div id="context-menu" class="context-menu">
  <ul class="context-menu_items">
    <li class="context-menu_item">
      <a href="documents/open/15" class="context-menu_link" data-action="Open">
        <i class="material-icons">open_with</i><p>Open</p>
      </a>
    </li>
    <li class="context-menu_item">
      <a href="#" class="context-menu_link" data-action="Share">
        <i class="material-icons">share</i><p>Share</p>
      </a>
    </li>
    <li class="context-menu_item">
      <a href="documents/15/edit" class="context-menu_link" data-action="Edit">
        <i class="material-icons">edit</i><p>Edit</p>
      </a>
    </li>
    <li class="context-menu_item">
      <a href="#" class="context-menu_link" data-action="Delete">
        <i class="material-icons">delete</i><p>Delete</p>
      </a>
    </li>
  </ul>
</div>
@endsection
