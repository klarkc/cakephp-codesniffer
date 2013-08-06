<?php

class MyCakePHP_Sniffs_WhiteSpace_CommaWhitespaceSniff implements PHP_CodeSniffer_Sniff {

	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register() {
		return array(T_COMMA);
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile All the tokens found in the document.
	 * @param int $stackPtr The position of the current token
	 *    in the stack passed in $tokens.
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
		$tokens = $phpcsFile->getTokens();

		$next = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), null, true);

		if ($tokens[$next]['code'] !== T_WHITESPACE && ($next !== $stackPtr + 2)) {
			$error = 'Missing space after comma';
			$phpcsFile->addError($error, $next);
		}
	}

}
