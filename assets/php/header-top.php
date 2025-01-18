<div class="site-header-top">
	<div class="site-header-top-btns">
		<div class="site-header-top-btns-left">
			<div class="donate-btn">
				<a href="/donate/">
					<i class="fa-solid fa-circle-exclamation"></i>
					<span>Donate</span>
				</a>
			</div>
		</div>
		<div class="site-header-top-btns-right">
			<div class="platform-selector">
				<i class="fa-solid fa-gamepad"></i>
				<form>
					<div>
						<select onchange="selectPlatform(this.value)">
							<option value="" disabled hidden>Select Platform</option>
							<option value="universal">Universal</option>
							<option value="playstation">PlayStation</option>
							<option value="xbox">Xbox</option>
							<option value="switch">Nintendo Switch</option>
							<option value="plain-text">Plain Text</option>
						</select>
					</div>
				</form>
			</div>
			<div class="theme-selector" onclick="toggleTheme()">
				<i class="fa-solid fa-moon"></i>
				<div class="theme-btn">
					<div class="theme-btn-switch"></div>
				</div>
			</div>
		</div>
	</div>
</div>